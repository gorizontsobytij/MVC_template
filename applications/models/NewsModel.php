<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 18.07.18
 * Time: 20:54
 */

class NewsModel extends Model
{
    public function newsAction(){
        $sql = ('SELECT * FROM new_schema.news WHERE `id` = ? ');
        return $sql;
    }
}