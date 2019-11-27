<?php

/**
 * Class Login
 *
 * @author Yoel Susanto <yoelsusantopro@yahoo.com>
 *
 */
class Login extends Controller
{
    /**
     * Store user model
     *
     * @var User_model 
     */
    private $_user_model;

    /**
     * Store session model
     *
     * @var Session_model
     */
    private $_session_model;

    /**
     * Login constructor.
     */
    public function __construct()
    {

        $this->_user_model = $this->model('User_model');
        $this->_session_model = $this->model('Session_model');
    }

    /**
     * Serve login page
     *
     * @return void
     */
    public function index()
    {
        if (isset($_COOKIE['sid'])) {
            header('Location: ' . BASEURL);
        }

        $this->data['title'] = 'Login';
        $this->data['page_css'] = 'login';
        $this->data['page_js'] = 'login';
        $this->data['header_off'] = true;

        $this->view('templates/header');
        $this->view('login/index', $this->data);
        $this->view('templates/footer');
    }

    /**
     * Handle login ajax request
     *
     * @return void
     */
    public function dologin()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $email = $data['email'];
        $password = $data['password'];

        $resp_obj = [
            'status' => null,
            'message' => null,
        ];

        $user = $this->_user_model->getUserByEmailAndPassword($email, $password);
        if (!$user) { //wrong credential
            $resp_obj['status'] = INVALID_CREDENTIAL;
            $resp_obj['message'] = 'Invalid username or password';

            return_json($resp_obj);
            return;
        }

        // if user credential is valid
        $sid = null;
        $expire_time = $this->_session_model->newSessionExpireTime();
        $session = $this->_session_model->findSessionByUserID($user['user_id']);

        if (!$session) { //kalau tidak ada di session
            $sid = $this->_session_model->createSessionForUser($user, $expire_time);
            $resp_obj['status'] = SUCCESS;

        } else { // if session has expired

            $sid = $this->_session_model->updateSessionExpireTime($session, $expire_time);
            $resp_obj['status'] = SUCCESS;
        }

        setcookie('sid', $sid, $expire_time,  '/tubes2wbd/Engima/');

        echo json_encode($resp_obj);
    }

    public function logout() {
        $cookie_name = 'sid';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, null, -1, '/tubes2wbd/Engima/');
        header('Location:' . BASEURL);
    }
}