<?php
 include_once ("applications/config/сonfig.php");
class LinkDB
{
    private static $link = null;
    /*
     * Connect DB with Singleton template
     */
    public static function getLink(){

        if(null === self::$link){
            self::$link = new PDO(DSN, USERNAME, PASSWORD);
            self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$link;
    }
    private function __construct(){
    }
     private function __clone(){
         // TODO: Implement __clone() method.
     }

}

