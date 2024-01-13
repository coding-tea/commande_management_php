<?php

use Components\Form;
use Database\Db;

require "./Includes/require.php";

Form::form([
    "name" => Heads::TEXT,
    "email" => Heads::EMAIL,
    "phone" => Heads::TEXT,
]);