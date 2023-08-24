<?php

class Order{

    private $db;
    private $id;
    private $user_id;
    private $location;
    private $address;
    private $status;
    private $delivery_status;
    private $total_price;

    public function __construct(){
        $this->db = Database::connection();
    }

    public function getID(){
        return $this->id;
    }

    public function getUserID(){
        return $this->user_id;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getAddress(){
        return $this->address;
    }
    public function getStatus(){
        return $this->status;
    }

    public function getDeliveryStatus(){
        return $this->delivery_status;
    }

    public function getTotalPrice(){
        return $this->total_price;
    }
    
    public function setID($id){
        $this->id = $this->db->real_escape_string($id);
    }

    public function setUserID($user_id){
        $this->user_id = $this->db->real_escape_string($user_id);
    }

    public function setLocation($location){
        $this->location = $this->db->real_escape_string($location);
    }

    public function setAddress($add){
        $this->address = $this->db->real_escape_string($add);
    }

    public function setStatus($status){
        $this->status = $this->db->real_escape_string($status);
    }

    public function setDeliveryStatus($delivery){
        $this->delivery_status = $this->db->real_escape_string($delivery);
    }

    public function setTotalPrice($totalPrice){
        $this->total_price = $this->db->real_escape_string($totalPrice);
    }

    # Get One Order.
    public function getOrder(){
        $sql = "SELECT * FROM `order` WHERE id = {$this->getID()}";
    }
    
    # Get all Orders.
    public function getOrders(){
        $sql = "SELECT * FROM `order` ORDER BY id DESC";
        return $this->db->query($sql);
    }

    public function save(){
        $sql = "INSERT INTO `order` VALUES(null, {$this->getUserID()},";
        $sql .= " '{$this->getLocation()}', '{$this->getAddress()}',{$this->getStatus()}, ";
        $sql .= " '{$this->getDeliveryStatus()}',{$this->getTotalPrice()}, curdate(), curtime() ";
        $sql .= ")";
        $sql_db = $this->db->query($sql);
        

        $status = false;

        if($sql_db){
            $status = true;
        }
        return $status;
    }


}