<?php

use Components\Form;
use Components\Table;
use Database\Db;

require "./Includes/require.php";

Form::form([
    "name" => Heads::TEXT,
    "email" => Heads::EMAIL,
    "phone" => Heads::TEXT,
]);

Table::data_table(
    [
    "id" => Heads::TEXT,
    "name" => Heads::TEXT,
    "email" => Heads::EMAIL,
    "mobile" => Heads::TEXT,
    "adress" => Heads::TEXT,
    ],
    [
        "add.php" => Actions::ADD,
        "delete.php" => Actions::DELETE
    ],
    Db::query("select * from clients", [], 'fetchAll', PDO::FETCH_ASSOC)
);