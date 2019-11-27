<?php

class Home extends Controller
{
    /**
     * Default method of home controller
     *
     * @return void
     */
    private $_movies_model;
    private $_user_model;

    public function __construct(){
        $this->_movies_model = $this->model('Movies_model');
        $this->_user_model = $this->model('User_model');
    }

    public function index()
    {
        if(isset($_COOKIE['sid'])){
            $this->data['username'] = $this->_user_model->getUserBySID($_COOKIE['sid'])['username'];
        }

        $method = 'GET';
        $url = 'https://api.themoviedb.org/3/movie/now_playing?'.
                    'api_key=8faf32e28798f5b0ee471b8c1341344b&language=en-US&page=1&region=id';
        $data = NULL;
        
        $this->data['movie_db'] = callApi($method, $url, $data);
        $this->data['movie_db'] = json_decode($this->data['movie_db'], true);
        $this->data['movie_db'] = $this->data['movie_db']['results'];

        // $this->data['movie_db'] = $this->_movies_model->getAllMovie();
        $this->data['title'] = 'Home';
        $this->data['page_css'] = 'home';
        $this->data['page_js'] = 'home';

        $this->view('templates/header');
        $this->view('home/index', $this->data);
        $this->view('templates/footer');
        
    }
}