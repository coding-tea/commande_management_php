<?php

namespace Models;

use Type;

class Details_Commande
{

    static $table = "details_commande";
    static $columns = [
        "id" => Type::PRIMARY,
        "commande_id" => Type::INT,
        "product_id" => Type::INT,
        "comm" => Type::FORIGNCOMM,
        "prod" => Type::FORIGNPROD,
        "quantity" => Type::INT,
    ];

    public function __construct()
    {
    }
}
