<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 15.06.18
 * Time: 14:06
 */

class NotFoundController extends Controller
{

    public function __construct()
    {
    }

    public function NotFoundAction()
    {
        $view = new View();
        $view->generate('NotFound');
    }
}