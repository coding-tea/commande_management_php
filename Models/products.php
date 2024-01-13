<?php

namespace Models;

use Type;

class Products
{
    static $table = "products";
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
