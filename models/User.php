<?php 

class User{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $pwd;
    private $role;
    private $thumbnail;

    private $db;


    public function __construct(){
        $this->db = Database::connection();
    }

    public function getID(){
        return $this->id;
    }

    public function getName(){
        // return $this->name;
        return $this->name;
    }

    public function getSurname(){
        // return $this->surname;
        return $this->surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPwd(){
        return $this->pwd;
    }

    public function getRole(){
        return $this->role;
    }

    public function getThumbnail(){
        return $this->thumbnail;
    }

    public function setID($id){
        $this->id = $id ;
    }

    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    public function setSurname($surname){
        $this->surname = $this->db->real_escape_string($surname);
    }

    public function setEmail($mail){
        $this->email = $this->db->real_escape_string($mail);
    }

    public function setPwd($pwd){
        $this->pwd = password_hash($this->db->real_escape_string($pwd), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setRole($rol){
        $this->role = $this->db->real_escape_string($rol);
    }

    public function setThumbnail($img){
        $this->thumbnail = $img;
    }

    public function save(){
        $sql = "INSERT INTO user(name,surname,email,password,role,thumbnail, date_start) "
              ."values ('{$this->getName()}', '{$this->getSurname()}', '{$this->getEmail()}', '{$this->getPwd()}', 'normal_user', null, curdate())";
        
        $status_sql = $this->db->query($sql);

        $result = false;
        if($status_sql){
            $result = true;
        }

        return $result;
    }
}