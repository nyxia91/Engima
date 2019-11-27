<?php

class History extends Controller
{
    /**
     * Default method of home controller
     *
     * @return void
     */

    private $_history_model;
    private $_user_model;

    public function __construct(){
        $this->_history_model = $this->model('History_model');
        $this->_user_model = $this->model('User_model');
    }

    public function index()
    {
        

        if(isset($_COOKIE['sid'])){
            $user_id = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
            $this->data['trans_history'] = $this->_history_model->getHistoryByUserId($this->_user_model->getUserBySID($_COOKIE['sid'])['user_id']);
        }

        //Call REST API to get transaction status and update
        $method = "GET";
        $url = "http://3.0.90.7:3308/transaksi/" . $user_id;
        $data = NULL;

        $this->data['trans_history'] = callApi($method, $url, $data);
        $this->data['trans_history'] = json_decode($this->data['trans_history'], true);

        //Call MovieDB API to GET movie pics
        foreach($this->data['trans_history'] as $key => $value){
            $method = 'GET';
            $url = 'https://api.themoviedb.org/3/movie/'. $value['film_id'] .'?api_key=8faf32e28798f5b0ee471b8c1341344b&language=en-US';
            $data = NULL;
            
            $movie = callApi($method, $url, $data);
            $movie = json_decode($movie, true);
            $this->data['trans_history'][$key]['movie_pic'] = $movie['poster_path'];
        }

        //Call API to update status
        foreach($this->data['trans_history'] as $history){
            $method = "PATCH";
            $url = "http://3.0.90.7:3308/transaksi/";
                
            if(time() - strtotime($history['waktu_transaksi']) > 120){
                $value = array(
                    'transactionId' => $history['transaction_id'], 
                    'status' => "Cancelled"
                );
                $data = json_encode($value);

                callApi($method, $url, $data);
            }
            
        }

        $this->data['title'] = 'History';
        $this->data['page_css'] = 'history';
        $this->data['page_js'] = 'history';

        
        $this->view('templates/header');
        $this->view('history/index', $this->data);
        $this->view('templates/footer');
        
    }

    
}