<?php 

namespace Database\Migrations;

use Database\Connection;
use Database\Connection\Db;


class Migration{
    public $table;
    public $columns = [];

    public function make($table, $columns){
        $Db = new Db();
        $connection = $Db->getConnection();

        $sql = "CREATE TABLE $table (";
        foreach($columns as $key => $value){
            $sql .= $key . $value->value;
        }
        $sql .= ");";

        $Db->query($sql);
    }

}