<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12.07.18
 * Time: 15:28
 */

class LoginModel extends Model
{
    public function loginAction(){
        $sql = ('SELECT * FROM new_schema.users WHERE login = ? AND password = ? ');

        return $sql;
    }


}