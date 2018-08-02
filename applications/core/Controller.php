<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.06.18
 * Time: 23:27
 */

class Controller
{
    public function __construct()
    {
    }

    public function IndexAction()
    {
        $model = new IndexModel();
        $view = new View();
        $view->generate('Index', $model->getName());
    }

}