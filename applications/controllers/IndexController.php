<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.06.18
 * Time: 23:29
 */

class IndexController extends Controller
{
    //private $auth;
    public function __construct(){
        //echo 'hello Iam Index Controller!';
    }

    public function IndexAction(){

        $this->newsQueryManipulation();

        if(isset($_SESSION['auth'])){
            $view = new View();
            $view->generate('Index');

        }else{
            exit('Доступ запрещен');
        }
    }

    private function newsQueryManipulation(){
        $model = new NewsModel();
        $result = $model->my_query($model->newsAction());
        return $result;
    }

}
