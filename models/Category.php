<?php 

class Category{

    private $id;
    private $name;
    private $db;
    public function __construct(){
        $this->db = Database::connection();
    }

    public function getID(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

    public function setID($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    public function list(){
        $sql = "select * from category order by id desc";
        $arr_categories = $this->db->query($sql);       

        return $arr_categories;
    }

    public function create(){
        $sql = "insert into category(name) "
                ."values('{$this->getName()}')";
        $status_sql = $this->db->query($sql);

        $result = false;
        if($status_sql){
            $result = true;
        }
        return $result;
    }

    public function menu(){
        $sql = "select * from category order by id asc";
        $arr_categories = $this->db->query($sql);

        return $arr_categories;
    }
    
}