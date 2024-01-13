<?php

namespace Models;

use Type;

class Commandes
{
    static $table = "commandes";
    static $columns = [
        "id" => Type::PRIMARY,
        "commande_number" => Type::INT,
        "data" => Type::DATE,
        "client_id" => Type::INT,
        "" => Type::FORIGNCLIENT,
    ];


    public function __construct()
    {
    }
}
