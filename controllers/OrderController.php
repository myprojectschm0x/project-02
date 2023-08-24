<?php 

require_once 'models/Order.php';

class OrderController{

    public function index(){
        Utils::isUser();
        $cart = Utils::stats_cart();
        require_once 'views/order/index.php';
    }

    // public function do(){}
    public function save(){
        Utils::isUser();
        if(isset($_POST)){
            $user_id = $_SESSION['identity']->id;
            $location    = isset($_POST['location']) ? $_POST['location'] : null;
            $address     = isset($_POST['address']) ? $_POST['address'] : null;
            $total_price = isset($_POST['total_price']) ? $_POST['total_price'] : null;

            if($location && $address){
                $order = new Order();
                $order->setUserID($user_id);
                $order->setLocation($location);
                $order->setAddress($address);
                $order->setTotalPrice($total_price);
                $order->setStatus(true);
                $order->setDeliveryStatus("confirm");

                $status_db = $order->save();

                if($status_db){
                    $_SESSION['order'] = "complete";
                }else{
                    $_SESSION['order'] = "failed";
                }
            }else{
                $_SESSION['order'] = "failed";
            }
        }else{
            $_SESSION['order'] = 'failed';
        }
        header("Location:/order/index.php");
    }
}