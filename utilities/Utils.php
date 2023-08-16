<?php 
class Utils{

    // public function __construct(){}

    public static function deleteSession($sessionName){
        if(isset($sessionName)){
            unset($_SESSION[$sessionName]);
        }
        return $sessionName;
    }


    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:/");
        }else{
            return true;
        }
    }

    public static function categoryMenu(){
        require_once 'models/Category.php';
        $category = new Category();
        $categories = $category->menu();

        return $categories;
    }
}