<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.06.18
 * Time: 23:28
 */

class Router
{
    public function __construct()
    {
    }

    public static function Start()
    {
        //Назначение параметров по умолчанию
        $controller_name = 'index';
        $action_name = 'index';
        $action_parameters = [];

        //Преобразуем строку запроса в массив
        $route_array = explode('/', $_SERVER['REQUEST_URI']);

        //var_dump($route_array);
        if(!empty($route_array[1]))
        {
            $controller_name = $route_array[1];
        }
        //var_dump($controller_name);
        if(!empty($route_array[2]))
        {
            $action_name = $route_array[2];
        }

        //Добавляем префиксы
        $model_name = ucfirst($controller_name) . 'Model';
        //var_dump($model_name);
        $controller_name = ucfirst($controller_name) . 'Controller';
        //var_dump($controller_name);
        $action_name = ucfirst($action_name) . 'Action';

        if (file_exists(Q_PATH. '/applications/models/'. $model_name. '.php'))
        {
            include_once Q_PATH. '/applications/models/'. $model_name.'.php';

        }
        if (file_exists(Q_PATH. '/applications/controllers/'. $controller_name. '.php'))
        {
            include_once Q_PATH. '/applications/controllers/'. $controller_name.'.php';
        }
        else
        {

            include_once Q_PATH. '/applications/controllers/'. 'NotFoundController'.'.php';
            $controller = new NotFoundController();
            //var_dump($controller);
           // var_dump($action_name);
            $controller->NotFoundAction();
            return;

        }
        $controller = new $controller_name();

       // var_dump($controller);
        //var_dump($action_name);
        $controller->$action_name();

       //var_dump($controller->$action_name());

    }
}