<?php 

namespace Database\Connection;

use PDO;
use PDOException;

class Db{

    //get connection using singleton design pattern

    public $connection = null;

    public function getConnection(){
        if($this->connection == null){
            try{
                $env = parse_ini_file('.env');
                $dsn = $env["dbms"] . "host=" . $env["host"] . ";dbname=" . $env["database"];
                $this->connection = new PDO($env["dsn"], $env["username"], $env["password"]);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return $this->connection;
    }

    private function __construct() {
    }
}