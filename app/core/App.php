<?php

/**
 * Class
 *
 * Used for routing traffic to appropriate controller
 */
class App
{
    /**
     * Default controller is home
     *
     * @var string
     */
    protected $controller = 'Home';
    /**
     * Default method for every controller is index
     *
     * @var string
     */
    protected $method = 'index';
    /**
     * Params contains parameters from url (after slash method)
     *
     * @var array
     */
    protected $params = [];


    /**
     * App constructor.
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $url = $this->parseURL();

        if (file_exists(__DIR__ . '/../controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        if (!isset($_COOKIE['sid']) and ($this->controller!='Login' and $this->controller!='Register')) {
           header('Location: ' . BASEURL . 'login');
        }

        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse URL and return array containing URL elements
     *
     * @return array|mixed|string
     */
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}