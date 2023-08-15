<?php 

class Database{

    private $localhost = "localhost";
    private $user = "chema";
    private $pwd = "StardustR1v3n";
    private $database = "udemy_masterphp_project2";

    public static function connection(){
        $db = new mysqli("localhost","chema","StardustR1v3n","udemy_masterphp_project2");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}