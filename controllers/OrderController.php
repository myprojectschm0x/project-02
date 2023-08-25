<?php 

require_once 'models/Order.php';

class OrderController{

    public function index(){
        Utils::isUser();
        $cart = Utils::stats_cart();
        require_once 'views/order/index.php';
    }

    public function list(){
        Utils::isUser();
        $user_id = $_SESSION['identity']->id;
        $order = new Order();
        
        $order->setUserID($user_id);
        $orders = $order->getOrdersByUser();

        require_once 'views/order/list.php';
    }

    public function confirm(){
        Utils::isUser();
        $user_id = $_SESSION['identity']->id;
        $order = new Order();
        $order->setUserID($user_id);
        $getOrder = $order->getOrderByUser();
        
        $product_order = new Order();
        $products = $product_order->getProductsByOrder($getOrder->id);
        require_once 'views/order/confirm.php';
    }

    public function save(){
        Utils::isUser();
        if(isset($_POST)){
            $user_id = $_SESSION['identity']->id;
            $location    = isset($_POST['location']) ? $_POST['location'] : null;
            $address     = isset($_POST['address']) ? $_POST['address'] : null;
            $total_price = Utils::stats_cart()['total'];

            if($location && $address){
                $order = new Order();
                $order->setUserID($user_id);
                $order->setLocation($location);
                $order->setAddress($address);
                $order->setTotalPrice($total_price);
                $order->setStatus(true);
                $order->setDeliveryStatus("confirm");

                # Save the order.
                $status_db = $order->save();

                # Save ticket.
                $ticket = $order->save_ticket();

                if($status_db && $ticket){
                    $_SESSION['order'] = "confirm";
                }else{
                    $_SESSION['order'] = "failed";
                }
            }else{
                $_SESSION['order'] = "failed";
            }
        }else{
            $_SESSION['order'] = 'failed';
        }
        header("Location:/order/confirm");
    }

    public function detail(){
        Utils::isUser();

        if(isset($_GET['id'])){
            $order_id = $_GET['id'];
            $order = new Order();

            # Get the Order
            $order->setID($order_id);
            $getOrder = $order->getOrder();

            # Get all products from order. 
            $product_order = new Order();
            $products = $product_order->getProductsByOrder($order_id);
            
            require_once 'views/order/detail.php';
        }else{
            header("Location:/");
        }
    }

    public function management(){
        Utils::isAdmin();


        $order = new Order();
        $orders = $order->getOrders();

        require_once 'views/order/admin/index.php';
    }

}