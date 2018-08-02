<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 18.07.18
 * Time: 18:08
 */

class NewsController extends Controller
{
    public function NewsAction()
    {
        $result = "";
        //var_dump($_GET);
        if(isset($_GET['page'])){
            $page = $_GET['page'];
           // var_dump($page);
            //$sql = 'SELECT * FROM new_schema.news WHERE `id` = ? ';
            $model = new NewsModel();
           $result =  $model->query_news($model->newsAction(),$page);
           //var_dump($result);
        }
        $view = new View();
        $view->generate("News",$result);
    }

}