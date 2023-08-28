<?php

require_once 'models/Product.php';
class ProductController
{
    public function index()
    {
        # Vie
        $product = new Product();
        $products = $product->getRandomProduct(6);
        require_once 'views/product/index.php';
    }

    public function management()
    {
        # Management or Dashboard. 
        Utils::isAdmin();

        $product_db = new Product();
        $products = $product_db->list();

        require_once 'views/product/admin/management.php';
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setID($_GET['id']);
            $fetch_product = $product->getProduct();

        }
        require_once 'views/product/show.php';
    }

    public function category()
    {
        if (isset($_GET['category_id'])) {
            $product = new Product();
            $product->setCategoryID($_GET['category_id']);
            $products = $product->product_by_category();

            require_once 'views/product/category.php';
        }
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/product/admin/create.php';
    }

    # View: Edit
    public function edit()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setID($_GET['id']);
            $fetch_product = $product->getProduct();
            $fetch_img = $product->getImg();
            require_once 'views/product/admin/edit.php';
        } else {
            header("Location:/product/management");
        }
    }

    public function save()
    {

        if (isset($_POST)) {
            $category_id = isset($_POST['category'])  ? $_POST['category']            : false;
            $name        = isset($_POST['name'])      ? $_POST['name']                : false;
            $desc        = isset($_POST['desc'])      ? $_POST['desc']                : false;
            $price       = isset($_POST['price'])     ? $_POST['price']               : false;
            $stock       = isset($_POST['stock'])     ? $_POST['stock']               : false;
            $discount    = isset($_POST['discount'])  ? $_POST['discount']            : null;
            // $thumbnail   = isset($_FILES['thumbnail']) ? $_FILES['thumbnail']['name'] : null;

            if ($category_id && $name && $desc && $price && $stock) {
                $product = new Product();
                $product->setCategoryID($category_id);
                $product->setName($name);
                $product->setDescription($desc);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setDiscount($discount);

                # Upload an image.
                if (isset($_FILES['thumbnail'])) {
                    $file = $_FILES['thumbnail'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        $dir = dirname(__DIR__ . '../');
                        if (!is_dir($dir . '/uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        $filename_w_date = time() . $filename;
                        move_uploaded_file($file['tmp_name'], $dir . '/uploads/images/' . $filename_w_date);
                        $product->setThumbnail($filename_w_date);
                    } else {
                        $_SESSION['product'] = 'wrong_image';
                    }
                }

                $status = $product->save();

                if ($status) {
                    $_SESSION['product'] = 'successful';
                } else {
                    $_SESSION['product'] = 'failed_to_save';
                }
            } else {
                $_SESSION['product'] = 'failed_form';
            }
        } else {
            $_SESSION['product'] = 'error';
        }
        header("Location:/product/create");
    }

    # Function Update. 
    public function update()
    {
        # Update the product
        if (isset($_POST)) {
            $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $category_id = isset($_POST['category']) ? $_POST['category'] : false;
            $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $discount = isset($_POST['discount']) ? $_POST['discount'] : null;
            $current_img = isset($_POST['current_img']) ? $_POST['current_img'] : null;

            if ($name && $category_id && $price && $stock) {
                $product = new Product();
                $product->setID($product_id);
                $product->setName($name);
                $product->setCategoryID($category_id);
                $product->setDescription($desc);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setDiscount($discount);


                if (isset($_FILES) && $_FILES['thumbnail']['name'] != '') {

                    $img = $_FILES['thumbnail'];
                    $filename = $img['name'];
                    $mimetype = $img['type'];

                    if ($mimetype == "image/jpeg" || $mimetype == 'image/png' || $mimetype == 'img/jpg' || $mimetype == 'image/gif') {
                        
                        $dir = dirname(__DIR__ . '../');
                        # Previous Image image to delete
                        $path_img = $dir . '/uploads/images/' . $current_img;
                        # New image
                        $filename_w_date = time() . $filename;


                        # Delete Img if exists.
                        if (file_exists($path_img)) {
                            unlink($path_img);
                        }

                        # Move the new Image to the Folder.
                        if (is_dir($dir . '/uploads/images')) {
                            move_uploaded_file($img['tmp_name'], $dir . '/uploads/images/' . $filename_w_date);
                        }
                        $product->setThumbnail($filename_w_date);
                    }
                }else{
                    if($current_img){
                        $product->setThumbnail($current_img);
                    }
                }


                $status_update = $product->update();

                if ($status_update) {
                    $_SESSION['product']['update'] = "successful";
                } else {
                    $_SESSION['product']['update'] = 'failed';
                }
            } else {
                $_SESSION['product']['update'] = 'error_form';
            }

            header("Location:/product/management");
        }
    }

    public function delete()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setID($_GET['id']);

            $img_to_delete = $product->getImg();

            if($img_to_delete->num_rows >=1){
                $img = $img_to_delete->fetch_object();
                $dir = dirname(__DIR__.'../');
                $path_img = $dir . '/uploads/images/' . $img->thumbnail;

                if (file_exists($path_img)) {
                    unlink($path_img);
                }
            }

            $status = $product->delete();

            if ($status) {
                $_SESSION['product']['delete'] = 'successful';
            } else {
                $_SESSION['product']['delete'] = 'failed';
            }
        }
        header("Location:/product/management");
    }
}
