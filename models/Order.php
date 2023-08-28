<?php

class Order
{

    private $db;
    private $id;
    private $user_id;
    private $location;
    private $address;
    private $status;
    private $delivery_status;
    private $total_price;

    public function __construct()
    {
        $this->db = Database::connection();
    }

    public function getID()
    {
        return $this->id;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function getDeliveryStatus()
    {
        return $this->delivery_status;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setID($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $this->db->real_escape_string($user_id);
    }

    public function setLocation($location)
    {
        $this->location = $this->db->real_escape_string($location);
    }

    public function setAddress($add)
    {
        $this->address = $this->db->real_escape_string($add);
    }

    public function setStatus($status)
    {
        $this->status = $this->db->real_escape_string($status);
    }

    public function setDeliveryStatus($delivery)
    {
        $this->delivery_status = $this->db->real_escape_string($delivery);
    }

    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $this->db->real_escape_string($totalPrice);
    }

    # Get One Order.
    public function getOrder()
    {
        $sql = "SELECT * FROM `order` WHERE id = {$this->getID()}";
        return $this->db->query($sql)->fetch_object();
    }

    # Get all Orders.
    public function getOrders()
    {
        $sql = "SELECT * FROM `order` ORDER BY id DESC";
        return $this->db->query($sql);
    }

    public function getOrderByUser()
    {
        $sql = "SELECT o.id, o.total_price FROM `order` o ";
        $sql .= "WHERE o.user_id = {$this->getUserID()} ORDER BY o.id DESC LIMIT 1";

        return $this->db->query($sql)->fetch_object();
    }

    public function getOrdersByUser()
    {
        # Desc, from the last to the newest.
        $sql = "SELECT o.* FROM `order` o "
            . "WHERE o.user_id = {$this->getUserID()} ORDER BY o.id DESC";

        return $this->db->query($sql);
    }

    public function getProductsByOrder($id)
    {
        $sql = "SELECT p.*, t.unity FROM product p "
            . "INNER JOIN ticket t ON p.id = t.product_id "
            . "WHERE t.order_id={$id}";

        return $this->db->query($sql);
    }

    public function save()
    {
        $sql = "INSERT INTO `order` VALUES(null, {$this->getUserID()},";
        $sql .= " '{$this->getLocation()}', '{$this->getAddress()}',{$this->getStatus()}, ";
        $sql .= " '{$this->getDeliveryStatus()}',{$this->getTotalPrice()}, curdate(), curtime() ";
        $sql .= ")";
        $query_db = $this->db->query($sql);

        $status = false;

        if ($query_db) {
            $status = true;
        }
        return $status;
    }

    public function save_ticket()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'request' ";
        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->request;

        foreach ($_SESSION['cart'] as $item) {
            $product = $item['product'];
            $insert = "INSERT INTO ticket(order_id, product_id, unity) VALUES({$order_id},{$product->id}, {$item['unity']})";
            $ticket = $this->db->query($insert);
        }

        $status = false;
        if ($ticket) {
            $status = true;
        }
        return $status;
    }

    public function updateDeliveryStatus(){
        $sql = "UPDATE `order` SET delivery_status = '{$this->getDeliveryStatus()}' "
                ."WHERE id = {$this->getID()}";
        $query = $this->db->query($sql);

        $status = false;
        if($query){
            $status = true;
        }

        return $status;
    }

    public function updateStatus(){}
}
