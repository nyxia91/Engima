<?php

class Review extends Controller
{
    /**
     * Default method of home controller
     *
     * @return void
     */
    private $_review_model;
    private $_user_model;
    private $_history_model;

    public function __construct(){
        $this->_review_model = $this->model('Review_model');
        $this->_user_model = $this->model('User_model');
        $this->_history_model = $this->model('History_model');
    }

    public function index(){
        echo "404 Error. Page not Found";
    }

    public function add($movie_id)
    {   
        if(isset($_COOKIE['sid'])){
            $this->data['username'] = $this->_user_model->getUserBySID($_COOKIE['sid'])['username'];
            $user_id = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
            $this->data['movie_data'] = $this->_review_model->getMovie($movie_id);
            $this->data['movie_data']['schedule_id'] = $this->_review_model->getScheduleByUserAndMovieId($user_id, $movie_id);
            $this->data['movie_data']['user_id'] = $user_id;
        }
     
        $this->data['title'] = 'Add Review';
        $this->data['page_css'] = 'review';
        $this->data['page_js'] = 'review';
        
        $this->view('templates/header');
        $this->view('review/index', $this->data);
        $this->view('templates/footer');
        
    }

    public function edit($movie_id)
    {
        if(isset($_COOKIE['sid'])){
            $this->data['username'] = $this->_user_model->getUserBySID($_COOKIE['sid'])['username'];
            $user_id = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
            $this->data['movie_data'] = $this->_review_model->getReviewByUserAndMovieId($user_id, $movie_id);
            $this->data['movie_data']['schedule_id'] = $this->_review_model->getScheduleByUserAndMovieId($user_id, $movie_id);
            $this->data['movie_data']['user_id'] = $user_id;
        }
     
        $this->data['title'] = 'Edit Review';
        $this->data['page_css'] = 'review';
        $this->data['page_js'] = 'review';
        
        $this->view('templates/header');
        $this->view('review/index', $this->data);
        $this->view('templates/footer');
        
    }

    public function submitadd($movie_id)
    {
        
            // uploding file
            $review = [
                'rate' => $_REQUEST['rated'],
                'review' => $_REQUEST['review_content'],
                'user_id'=> $_REQUEST['user_id'],
                'movie_id'=> $_REQUEST['movie_id'],
                'schedule_id' => $_REQUEST['schedule_id']
            ];
            $this->_review_model->insertReview($review);
            
            header("Location: " . BASEURL . "history");
            
            
    }

    public function submitedit($movie_id){
        
            // uploding file
            $review = [
                'rate' => $_REQUEST['rated'],
                'review' => $_REQUEST['review_content'],
                'user_id'=> $_REQUEST['user_id'],
                'movie_id'=> $_REQUEST['movie_id'],
                'schedule_id' => $_REQUEST['schedule_id']
            ];
                $this->_review_model->updateReview($review);
                header("LOCATION: ". BASEURL . "history");
    }

    public function delete($movie_id){
        $user_id = $this->_user_model->getUserBySID($_COOKIE['sid'])['user_id'];
        $this->_review_model->deleteReview($user_id, $movie_id);
        header("Location: " . BASEURL . "history");
    }
    
}