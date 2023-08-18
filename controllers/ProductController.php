<?php 

require_once 'models/Product.php';
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
        require_once 'views/product/admin/create.php';
    }

    public function save(){

        if( isset($_POST) ){
            $category_id = isset($_POST['category'])  ? $_POST['category']            : false;
            $name        = isset($_POST['name'])      ? $_POST['name']                : false;
            $desc        = isset($_POST['desc'])      ? $_POST['desc']                : false;
            $price       = isset($_POST['price'])     ? $_POST['price']               : false;
            $stock       = isset($_POST['stock'])     ? $_POST['stock']               : false;
            $discount    = isset($_POST['discount'])  ? $_POST['discount']            : null;
            // $thumbnail   = isset($_FILES['thumbnail']) ? $_FILES['thumbnail']['name'] : null;

            if($category_id && $name && $desc && $price && $stock ){
                $product = new Product();
                $product->setCategoryID($category_id); 
                $product->setName($name);
                $product->setDescription($desc);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setDiscount($discount);
                // $product->setThumbnail($thumbnail);

                # Upload an image.
                if(isset($_FILES['thumbnail'])){
                    $file = $_FILES['thumbnail'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                        $dir = dirname(__DIR__.'../');
                        if(!is_dir($dir.'/uploads/images')){
                            mkdir('uploads/images',0777, true);
                        }
                        $filename_w_date = time().$filename;
                        move_uploaded_file($file['tmp_name'], $dir.'/uploads/images/'.$filename_w_date);
                        $product->setThumbnail($filename_w_date);
                    }else{
                        $_SESSION['product'] = 'wrong_image'; 
                    }
                }

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

    public function delete(){
        var_dump($_GET);
        die();
        if(isset($_GET['id'])){
            $product = new Product();
            $product->setID($_GET['id']);
            $status = $product->delete();

            if($status){
                $_SESSION['product']['delete'] = 'successful';
            }else{
                $_SESSION['product']['delete'] = 'failed';
            }
        }
        header("Location:/product/management");
    }
}