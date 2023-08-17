<?php 

require_once 'models/Product.php';
require_once 'models/Category.php';
class ProductController{
    public function index(){
        # View
        require_once 'views/product/index.php';
    }

    public function management(){
        Utils::isAdmin();

        $product_db = new Product();
        $products = $product_db->list();
        

        require_once 'views/product/admin/management.php';
    }

    public function create(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->list();
        require_once 'views/product/admin/create.php';
    }

    public function save(){
        if( isset($_POST) ){
            $category_id = isset($_POST['category'])  ? $_POST['category']  : false;
            $name        = isset($_POST['name'])      ? $_POST['name']      : false;
            $desc        = isset($_POST['desc'])      ? $_POST['desc']      : false;
            $price       = isset($_POST['price'])     ? $_POST['price']     : false;
            $stock       = isset($_POST['stock'])     ? $_POST['stock']     : false;
            $discount    = isset($_POST['discount'])  ? $_POST['discount']  : false;
            $thumbnail   = isset($_POST['thumbnail']) ? $_POST['thumbnail'] : false;

            if($category_id && $name && $desc && $price && $stock && $discount && $thumbnail){
                $product = new Product();
                $product->setCategoryID($category_id);
                $product->setName($name);
                $product->setDescription($desc);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setDiscount($discount);
                $product->setThumbnail($thumbnail);

                $status = $product->save();

                if($status){
                    $_SESSION['product'] = 'successful';
                }else{
                    $_SESSION['product'] = 'failed_to_save';
                }

            }else{
                $_SESSION['product'] = 'failed_form';
            }

        }else{
            $_SESSION['product'] = 'error';
        }
        header("Location:/product/create");
    }
}