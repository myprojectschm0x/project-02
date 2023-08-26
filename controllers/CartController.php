<?php

require_once 'models/Product.php';
class CartController
{
    public function index()
    {
        Utils::isUser();
        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
            $cart = $_SESSION['cart'];
        }else{
            $cart = array();
        }
        require_once 'views/cart/index.php';

    }

    public function add()
    {
        if (!isset($_GET['product_id'])) {
            header("Location:/");
        }
        $product_id = $_GET['product_id'];

        if (isset($_SESSION['cart'])) {
            $counter = 0;
            # Add one more unity to the same product.
            foreach ($_SESSION['cart'] as $index => $item) {
                if ($item['product_id'] == $product_id) {
                    $_SESSION['cart'][$index]['unity']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            # Get a Product.
            $product = new Product();
            $product->setID($product_id);

            $fetch_product = $product->getProduct();

            if (is_object($fetch_product) && $fetch_product->num_rows > 0) {
                $item = $fetch_product->fetch_object();

                $_SESSION['cart'][] = array(
                    "product_id" => $item->id,
                    "price" => $item->price,
                    "unity" => 1,
                    "product" => $item
                );
            }
        }


        header("Location:/cart/index");
    }

    public function up(){
        Utils::isUser();
        if(!isset($_GET['index'])){
            header("Location:/");
        }
        # Add One. 
        $index = $_GET['index'];
        $_SESSION['cart'][$index]['unity']++;

        header("Location:/cart/index");
    }
    public function down(){
        Utils::isUser();
        if(!isset($_GET['index'])){
            header("Location:/");
        }

        $index = $_GET['index'];
        $_SESSION['cart'][$index]['unity']--;

        if($_SESSION['cart'][$index]['unity'] == 0){
            unset($_SESSION['cart'][$_GET['index']]);
        }
        
        header("Location:/cart/index");
    }

    public function remove()
    {
        if(!isset($_GET['index'])){
            header("Location:/");
        }
        unset($_SESSION['cart'][$_GET['index']]);
        header("Location:/cart/index");
    }


    public function delete_all()
    {
        unset($_SESSION['cart']);
        header("Location:/cart/index");
    }
}
