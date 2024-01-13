<?php 

namespace Models;

use Type;

class Clients{
    static $table = "clients";
    static $columns = [
        "id" => Type::PRIMARY,
        "name" => Type::STRING,
        "email" => Type::STRING,
        "mobile" => Type::STRING,
        "adress" => Type::STRING,
    ];

    public function __construct() {
    }

}