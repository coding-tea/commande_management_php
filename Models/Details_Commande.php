<?php

namespace Models;

use Type;

class Details_Commande
{

    static $table = "details_commande";
    static $columns = [
        "id" => Type::PRIMARY,
        "commande_id" => Type::INT,
        "produt_id" => Type::INT,
        " " => Type::FORIGNCOMM,
        " " => Type::FORIGNPROD,
        "quantity" => Type::INT,
    ];

    public function __construct()
    {
    }
}
