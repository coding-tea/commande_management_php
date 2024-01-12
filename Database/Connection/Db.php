<?php 

namespace Database\Connection;

use PDO;
use PDOException;

class Db{

    //get connection using singleton design pattern

    public $connection = null;

    private function __construct() {
        $this->getConnection();
    }

    public function getConnection(){
        if($this->connection == null){
            try{
                $env = parse_ini_file('.env');
                $dsn = $env["dbms"] . "host=" . $env["host"] . ";dbname=" . $env["database"];
                $this->connection = new PDO($dsn, $env["username"], $env["password"]);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return $this->connection;
    }

    public function query($sql = "", $args = [], $fetchtype = "fetch"){
        $stmt = $this->connection->prepare($sql);
        $flag = $stmt->execute($args);
        $data = [];
        switch($fetchtype){
            case "fetch":
                $data = $stmt->fetch(PDO::FETCH_OBJ); break;
            case "fetchAll":
                $data = $stmt->fetchAll(PDO::FETCH_OBJ); break;
            default :
                break;
        }
        return $data;
    }
}