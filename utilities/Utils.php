<?php 
class Utils{

    // public function __construct(){}

    public static function deleteSession($sessionName, $arr2 = null){
        if(isset($sessionName)){
            if(isset($arr2)){
                unset($_SESSION[$sessionName][$arr2]);
            }else{
                unset($_SESSION[$sessionName]);
            }
        }
        return $sessionName;
    }

    public static function isUser(){
        if(!isset($_SESSION['identity'])){
            header("Location:/");
        }
        return true;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:/");
        }
        return true;
    }

    public static function categoryMenu(){
        require_once 'models/Category.php';
        $category = new Category();
        $categories = $category->menu();

        return $categories;
    }

    public static function listCategory(){
        require_once 'models/Category.php';
        $category = new Category();

        return $category->list();
    }
}