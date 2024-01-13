<?php

namespace Models;

use Type;

class Produts
{
    static $table = "produits";
    static $columns = [
        "id" => Type::PRIMARY,
        "code" => Type::STRING,
        "name" => Type::STRING,
        "description" => Type::TEXT,
        "amount" => Type::FLOAT,
    ];


    public function __construct()
    {
    }
}
