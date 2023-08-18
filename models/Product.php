<?php 

class Product{

    private $db;
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $discount;
    private $date;
    private $thumbnail;

    public function __construct(){
        $this->db = Database::connection();
    }

    public function getID(){
        return $this->id;
    }

    public function getCategoryID(){
        return $this->category_id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return (double)$this->price;
    }

    public function getStock(){
        return (int)$this->stock;
    }

    public function getDiscount(){
        return (double)$this->discount;
    }
    // public function getDate(){
    //     return $this->date;
    // }

    public function getThumbnail(){
        return $this->thumbnail;
    }

    public function setID($id){
        $this->id = $this->db->real_escape_string($id);
    }

    public function setCategoryID($relation_id){
        $this->category_id = $this->db->real_escape_string($relation_id);
    }

    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    public function setDescription($desc){
        $this->description = $this->db->real_escape_string($desc);
    }

    public function setPrice($price){
        $this->price = $this->db->real_escape_string($price);
    }

    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setDiscount($per){
        $this->discount = $this->db->real_escape_string($per);
    }

    // public function setDate($date){
    //     $this->date = $this->db->real_escape_string($date);
    // }
    public function setThumbnail($img){
        $this->thumbnail = $this->db->real_escape_string($img);
    }

    public function list(){
        $sql = "select p.*, c.name as 'category' from product p "
                ."inner join category c on p.category_id = c.id "
                ."order by p.id desc";

        return $this->db->query($sql);
    }

    public function save(){
        $sql = "insert into product(category_id, name, description, price, stock, discount, date, thumbnail) "
                ."values({$this->getCategoryID()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, "
                ."{$this->getStock()}, "
                ."{$this->getDiscount()}, "
                ."curdate(), "
                ."'{$this->thumbnail}'"
                ." )";
        # MOstrar errores; Tips para depurar.
        // echo $this->db->error;
        // die();
        $status_sql = $this->db->query($sql);

        
        $result = false;
        if($status_sql){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM product WHERE id = {$this->getID()}";
        $status_sql = $this->db->query($sql);
        
        $result = false;
        if($status_sql){
            $result = true;
        }

        return $result;
    }

}