<?php 

namespace Components;

use Heads;

class Form {

    public static function form($heads = [], $action = "", $method = "POST"){
        echo "<form action='$action'  method='$method' >";
        foreach($heads as $key => $value){
            if(
                $value->value == Heads::TEXTARIA
            ){
                echo "<div class='mt-5'>";
                echo "<label for='$key' class='form-label'> $key </label>";
                echo "<textarea cols='20' rows='40' id='$key' name='$key'></textarea>";
                echo "</div>";
            }else{
                echo "<div class='mt-5'>";
                echo "<label for='$key' class='form-label'> $key </label>";
                echo "<input type='$value->value' id='$key' name='$key' class='form-control' />";
                echo "</div>";
            }
        }
        echo "</form>";
    }

}