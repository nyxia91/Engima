<?php


/**
 * Class Register
 *
 * @author Yoel Susanto <yoelsusantopro@yahoo.com>
 */
class Register extends Controller
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
     * Register constructor.
     */
    public function __construct()
    {
        $this->_user_model = $this->model('User_model');
        $this->_session_model = $this->model('Session_model');
    }
    
    /**
     * Serve register page
     * 
     * @return void
     */
    public function index()
    {
        $this->data['title'] = 'Register';

        $this->data['page_css'] = 'register';
        $this->data['page_js'] = 'register';
        $this->data['header_off'] = true;

        $this->view('templates/header');
        $this->view('register/index', $this->data);
        $this->view('templates/footer');
    }

    public function checkunique()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $type = $data['type'];
        $user_data = $data['data'];

        $user = null;

        switch ($type) {
            case 'username':
                $user = $this->_user_model->getUserByUsername($user_data);
                break;
            case 'email':
                $user = $this->_user_model->getUserByEmail($user_data);
                break;
            case 'phone':
                $user = $this->_user_model->getUserByPhone($user_data);
                break;
        }

        $resp = [
            'unique' => true
        ];

        if ($user) {
            $resp['unique'] = false;
        }
        return_json($resp);
    }

    public function submit()
    {
        try {
            // uploding file
            $profile_picture_path = PROFILE_PICTURE_PATH . $_REQUEST['username'] . '.png';
            if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_picture_path))
            {
//            $fileType = $_FILES['profile_pic']['type'];
//            $fileContent = file_get_contents($_FILES['profile_pic']['tmp_name']);
//            $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
                $user = [
                    'username' => $_REQUEST['username'],
                    'email' => $_REQUEST['email'],
                    'phone' => $_REQUEST['phone'],
                    'password' => $_REQUEST['password'],
                    'profile_pic' => $profile_picture_path
                ];
                $this->_user_model->insertUser($user);
            }
        }
        catch (Exception $exception) {
            return_json($exception);
        }
    }

}