<?php

namespace Database;

use PDOException;
use PDO;
use Type;
use Models\Clients;
use Models\Commandes;
use Models\Details_Commande;
use Models\Products;

class Db
{

    //get connection using singleton design pattern
    static $connection = null;

    private function __construct()
    {
        $this->getConnection();
    }

    public static function getConnection()
    {
        if (Db::$connection == null) {
            try {
                $env = parse_ini_file('.env');
                $dsn = $env["dbms"] . ":host=" . $env["host"] . ";dbname=" . $env["database"];
                Db::$connection = new PDO($dsn, $env["username"], $env["password"]);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return Db::$connection;
    }

    public static function createTables()
    {
        Db::make(Clients::$table, Clients::$columns);
        Db::make(Products::$table, Products::$columns);
        Db::make(Commandes::$table, Commandes::$columns);
        Db::make(Details_Commande::$table, Details_Commande::$columns);
    }

    public static function query($sql = "", $args = [], $fetchtype = "fetch", $type = PDO::FETCH_OBJ)
    {
        $stmt = Db::getConnection()->prepare($sql);
        $flag = $stmt->execute($args);
        $data = [];
        if ($flag) {
            switch ($fetchtype) {
                case "fetch":
                    $data = $stmt->fetch($type);
                    break;
                case "fetchAll":
                    $data = $stmt->fetchAll($type);
                    break;
                default:
                    break;
            }
        }
        return $data;
    }

    public static function make($table, $columns)
    {
        Db::getConnection();
        $count = 1;
        $sql = "DROP TABLE IF EXISTS " . $table . ";" . "CREATE TABLE $table (";
        foreach ($columns as $key => $value) {
            if (
                $value->value == Type::FORIGNCLIENT->value ||
                $value->value == Type::FORIGNCOMM->value ||
                $value->value == Type::FORIGNPROD->value
            ) {
                $sql .= ($count != count($columns)) ? $value->value . "," : $value->value;
            } else {
                $sql .= ($count != count($columns)) ? $key . " " . $value->value . "," : $key . " " . $value->value;
            }
            $count++;
        }
        $sql .= ");";
        echo $sql . "</br> </br>";
        Db::query($sql);
    }
}
