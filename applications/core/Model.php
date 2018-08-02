<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14.06.18
 * Time: 23:28
 */

class Model
{
    public function __construct(){
    }

    /*
    * This is a login query.
    */
    public function query_login($sql,$login,$password){
        $query = LinkDB::getLink()->prepare($sql);
        $query->execute(array($login,$password));
        $result =  $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    /*
     * This is a news query
     */
    public function my_query($sql){
        $query = LinkDB::getLink()->prepare($sql);
        $query->execute();
        $result =  $query->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump($result);
        return $result;
    }
    /*
     * This is a news query.
     */
    public function query_news($sql,$get){
        $query = LinkDB::getLink()->prepare($sql);
        $query->execute(array($get));
        $result =  $query->fetchAll(PDO::FETCH_ASSOC);
        //  var_dump($result);
        return $result;
    }
    /*
     * This is a register query
     */
    public function my_execute($sql, $params = []){
        $condition = LinkDB::getLink()->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $value){

                $condition->bindValue(':'.$key, $value);
            }
        }
        $result = $condition->execute();
        return $result;
    }


}