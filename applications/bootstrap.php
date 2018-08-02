<?php

//include Q_PATH. '/applications/core/Controller.php';
//include Q_PATH. '/applications/core/Model.php';
//include Q_PATH. '/applications/core/View.php';
//include Q_PATH . '/applications/core/Router.php';
session_start();


set_include_path(get_include_path()
     .PATH_SEPARATOR .'applications/core/');

spl_autoload_register(function ($class) {
    include_once   $class.".php";
});

$start = Router::Start();

