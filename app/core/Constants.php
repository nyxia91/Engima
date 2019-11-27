<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . "/tubes2wbd/Engima/");
define('PROFILE_PICTURE_PATH',  BASE_PATH . "public/user_assets/profile_picture/");
define('BASEURL', 'http://3.0.90.7:3308:80/tubes2wbd/Engima/');
define('MOVIE_POSTER', BASEURL . "public/assets/images/poster/");
define('ICONS', BASEURL . "public/assets/images/icons/");
define('JSURL', BASEURL . 'js/');
define('CSSURL', BASEURL . 'css/');

//Login response status
define('SUCCESS', 0);
define('ALREADY_LOGGED_IN', 1);
define('INVALID_CREDENTIAL', 2);