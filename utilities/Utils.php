<?php 
class Utils{

    // public function __construct(){}

    public static function deleteSession($sessionName){
        if(isset($sessionName)){
            unset($_SESSION[$sessionName]);
        }
        return $sessionName;
    }
}