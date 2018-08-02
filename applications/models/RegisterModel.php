<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.06.18
 * Time: 21:36
 */

class RegisterModel extends Model
{
    /*
     * Add data to DB
     */
   public function regAction()
    {

        $sql = ("INSERT INTO  new_schema.users (name,password,email,login)
                                                  VALUES (:name,:password,:email,:login)");
        //var_dump($sql);
        return $sql;
    }
}

