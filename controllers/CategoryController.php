<?php 

require_once 'models/Category.php';

class CategoryController{
    public function index(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->list();
        require_once 'views/category/index.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }
    public function save(){
        Utils::isAdmin();
        if( isset($_POST)  && isset($_POST['name']) ){
            $category = new Category();
            $category->setName($_POST['name']);
            $status_category = $category->create();

            if($status_category){
                $_SESSION['category'] = 'successful';
            }else{
                $_SESSION['category'] = 'failed';
            }
        }
        header("Location:/category/index");
    }


}