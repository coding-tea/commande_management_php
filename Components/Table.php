<?php

namespace Components;

class Table
{
    public static function data_table($heads = [], $actions=[], $data)
    {
        echo "<table class'table'>";
        echo "<tr>";
        foreach ($heads as $key => $value) {
            echo "<th> $key </th>";
        }
        echo "</tr>";
        if (count($data) > 0) {
            foreach ($data as $row) {
                echo "<tr>";
                foreach ($heads as $key => $value) {
                    echo "<td>" . $row[$key] . "</td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }
}
