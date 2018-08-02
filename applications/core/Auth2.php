<?php

class Auth2
{
    private $link;
    public $post = array();

    public function __construct(){
        $this->request();
        $this->link = LinkDB::getLink();
    }
    /*
     * Проверяет, переданны ли данные POSTом
     */
    private function request(){
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $this->post = $_POST;
        }
        return $this->post;
    }

}