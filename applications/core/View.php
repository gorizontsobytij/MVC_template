<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.06.18
 * Time: 23:28
 */

class View
{
    public function __construct()
    {
    }

    public function generate($view, $data = [])
    {
        include Q_PATH. '/applications/views/template.php';
    }
}