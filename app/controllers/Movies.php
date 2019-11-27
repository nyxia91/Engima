<?php

class Movies extends Controller
{
    /**
     * Store movie model
     *
     * @var Movies_model
     */
    private $_movies_model;
    private $_schedule_model;
    private $_review_model;
    private $_seats_model;
    private $_history_model;
    private $_user_model;
    private $max_per_page = 3;

    public function __construct() {
        $this->_movies_model = $this->model('Movies_model');
        $this->_schedule_model = $this->model('Schedule_model');
        $this->_review_model = $this->model('Review_model');
        $this->_seats_model = $this->model('Seats_model');
        $this->_history_model = $this->model('History_model');
        $this->_user_model = $this->model('User_model');
    }

    public function detail($movie_id) {
        $result = '';

        // Call GET method for movie details
        $method = 'GET';
        $url = 'https://api.themoviedb.org/3/movie/'. $movie_id .'?api_key=8faf32e28798f5b0ee471b8c1341344b&language=en-US';
        $data = NULL;
        
        $movie = callApi($method, $url, $data);
        $movie = json_decode($movie, true);
        $genre = '';
        foreach($movie["genres"] as $genres){
            $genre = $genre . $genres["name"] . ", ";
        }
        $movie['genres'] = substr_replace($genre, '', -2);
        
        $schedule = $this->_schedule_model->getAllSchedulesByMovieID($movie_id);

        // Call GET method for review
        $method = 'GET';
        $url = 'https://api.themoviedb.org/3/movie/'. $movie_id .'/reviews?api_key=8faf32e28798f5b0ee471b8c1341344b&language=en-US&page=1';
        $data = NULL;
        
        $review = callApi($method, $url, $data);
        $review = json_decode($review, true);
        $review = $review['results'];

        foreach($review as $key => $value){
           $review[$key]['content'] = substr($review[$key]['content'], 0, 200);
        }
        
        // $review = $this->_review_model->getAllReviewsByMovieID($movie_id);

        $this->data['title'] = 'Movies';
        $this->data['page_css'] = 'movie_detail';
        $this->data['page_js'] = 'movie_detail';
        $data['movie'] = $movie;
        $data['schedule'] = $schedule;
        $data['review'] = $review;

        $this->view('templates/header');
        $this->view('movie_detail/index', $data);
        $this->view('templates/footer');
    }

    public function booking($movie_id, $schedule_id) {
        $schedule = $this->_schedule_model->getScheduleDetailByScheduleID($schedule_id);
        $seats = $this->_seats_model->getSeatsByScheduleID($schedule_id);
        if(isset($_COOKIE['sid'])){
            $this->data['user_id'] = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
        }

        $this->data['title'] = 'Movies';
        $this->data['page_css'] = 'booking';
        $this->data['page_js'] = 'booking';
        $data['movie_id'] = $movie_id;
        $data['schedule'] = $schedule[0];
        $data['seats'] = $seats;

        $this->view('templates/header');
        $this->view('movie_detail/booking', $data);
        $this->view('templates/footer');
    }

    public function doBooking() {
        $data = json_decode(file_get_contents('php://input'), true);
        
        $schedule_id = $data['schedule_id'];
        $seat_no = $data['seat_no'];
        $no_rek = $data['no_rek'];
        $value = $data['value'];
        $schedule = $this->_schedule_model->getScheduleDetailByScheduleID($schedule_id);
        
        $noVATujuan = "00000";

        if (isset($_COOKIE['sid'])) {
            $user_id = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
            $this->_seats_model->updateSeatByScheduleIDandSeatNo($user_id, $schedule_id, $seat_no, $value);
            $this->_schedule_model->updateAvailableSeats($schedule_id);
            $this->_history_model->insertHistory($user_id, $schedule_id, $seat_no);
            
            //Call SOAP API to WS-Bank
            
            $client = new SoapClient('http://3.1.25.69:8080/bankpro-ws/user?wsdl');
            $params = array(
                'noRek' => $no_rek
            );

            $result = $client->createVirtualAccount($params);
            $noVATujuan = $result->return;

            //end of Call SOAP

            //Call REST API to WS-Transaksi
            //insert new transaction
            $method = "POST";
            $url = "http://3.0.90.7:3308/transaksi";
            $value = array(
                'userId' => $user_id, 
                'noVATujuan' => $noVATujuan, 
                'filmId' => $schedule[0]['movie_id'], 
                'judulfilm' => $schedule[0]['movie_title'], 
                'seatNo' => $seat_no, 
                'status' => "Pending"
            );
            
            $data = json_encode($value);

            callApi($method, $url, $data);
            
            //get last insert data
            $method = "GET";
            $url = "http://3.0.90.7:3308/transaksi/last/" . $user_id;
            $value = NULL;

            $transaksi_id = callApi($method, $url, $data);
            $transaksi_id = json_decode($transaksi_id, true);
    
            $transaksi_id = $transaksi_id[0]['transaction_id'];
            //end of Call REST

            $resp_obj['status'] = SUCCESS;
            $resp_obj['message'] = 'Transaksi Berhasil. Silahkan lakukan pembayaran ke: ' . $noVATujuan .
                                        '<br> id transaksi: '  . $transaksi_id;
        } else {
            $resp_obj['status'] = INVALID_CREDENTIAL;
            $resp_obj['message'] = 'Your purchase has failed because of invalid credentials.';
        }

        return_json($resp_obj);
    }

    public function search($keyword='') {
        $this->data['title'] = "Search : $keyword";

        $this->data['keyword'] = $keyword;
        $this->data['length'] = $this->_movies_model->countMoviesByTitle($keyword);
        $this->data['max_per_page'] = 3;
        $this->data['max_page'] = ceil($this->data['length']/$this->data['max_per_page']);

        $this->data['page_css'] = 'search_result';
        $this->data['page_js'] = 'search_result';

        $this->view('templates/header');
        $this->view('movies/search_result', $this->data);
        $this->view('templates/footer');
    }
    
    // localhost/tubes2wbd/Engima/movies/searchbypage/keyword/page
    public function searchbypage($keyword='', $page=1) {
        $data['keyword'] = $keyword;

        $data['max_per_page'] = $this->max_per_page;
        $data['starting_idx'] = ($page-1) * $this->max_per_page;
        $movies = $this->_movies_model->findMoviesByPageAndTitle($data);

        return_json($movies);
    }
}