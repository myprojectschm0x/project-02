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
        return (int)$this->id;
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

    public function setThumbnail($img){
        $this->thumbnail = $this->db->real_escape_string($img);
    }

    public function getProduct(){
        $sql = "select p.*, c.name as 'category_name' from product p "
                ."inner join category c on p.category_id = c.id "
                ."where p.id = {$this->getID()}";

        return $this->db->query($sql);
    }

    public function getImg(){
        $sql = "select p.thumbnail from product p where id = {$this->getID()}";
        return $this->db->query($sql);
    }

    public function list(){
        $sql = "select p.*, c.name as 'category' from product p "
                ."inner join category c on p.category_id = c.id "
                ."order by p.id desc";

        return $this->db->query($sql);
    }

    public function save(){
        $sql = "insert into product "
                ."values(null, {$this->getCategoryID()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, "
                ."{$this->getStock()}, "
                ."{$this->getDiscount()}, "
                ."curdate() ";
        if($this->getThumbnail()){
            $sql .= ",'{$this->getThumbnail()}' ";
        }
        $sql .= " )";
        $status_sql = $this->db->query($sql);

        
        $result = false;
        if($status_sql){
            $result = true;
        }
        return $result;
    }

    public function update(){
        $sql = "update product "
                ."set name = '{$this->getName()}', "
                ."category_id = {$this->getCategoryID()}, "
                ."description = '{$this->getDescription()}', "
                ."price = {$this->getPrice()}, "
                ."stock = {$this->getStock()}, "
                ."discount = {$this->getDiscount()}, "
                ."date = curdate(), ";
        if($this->getThumbnail() != null){
            $sql .= "thumbnail = '{$this->thumbnail}' "; 
        }else{
            $sql .= "thumbnail = null " ;
        }
        $sql .= "where id = {$this->getID()}";
        $update = $this->db->query($sql);

        $result = false;
        if($update){
            $result = true;
        }

        return $result;
    }

    public function getRandomProduct($limit){
        $sql = "select * from product order by rand() limit $limit";
        return $this->db->query($sql);
    }

    public function product_by_category(){
        $sql = "select p.*, c.name as 'category_name' from product p "
                ."inner join category c on p.category_id = c.id "
                ."where p.category_id = {$this->getCategoryID()}";
                
        return $this->db->query($sql); 
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