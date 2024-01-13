<?php

namespace Components;

use Database\Db;
use PDO;

class Table
{
    public static function data_table($table, $heads = [], $actions = [], $data)
    {
        echo "<table class'table'>";
        echo "<tr>";
        foreach ($heads as $key => $value) {
            echo "<th> $key </th>";
        }
        echo "<th> actions </th>";
        echo "</tr>";
        if (count($data) > 0) {
            foreach ($data as $row) {
                echo "<tr>";
                foreach ($heads as $key => $value) {
                    echo "<td>" . $row[$key] . "</td>";
                }
                foreach ($actions as $key => $value) {
                    echo "<td><a href=" . $key . '?id=' . $row['id'] . " class='btn'> $value->value </a></td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";

        //=====> pagination
        //data per page
        $data_per_page = 5;

        //start
        $start = 0;
        $page = 1;
        if (isset($_GET["page"])) {
            $start = $_GET["page"] * $data_per_page;
            $page = $_GET["page"];
        }

        //count data
        $total = ceil(Db::query("SELECT count(*) as total from $table")->total / $data_per_page);

        //get all data
        $stmt = Db::getConnection()->query("SELECT * from $table LIMIT $start, $data_per_page ");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($total > 1) {
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination">';
            echo "<li class='page-item'><a class='page-link' href='?page=<?= " . ($page > 1) ? $_GET['page'] - 1 : 0 . "?>'>Previous</a></li> <?php else: ?>";

            for ($i = 0; $i < $total; $i++) {
                echo "<li class='page-item'><a class='page-link' href='?page=<?= " . $i . "?>'>" . $i + 1 . "</a></li> <?php else: ?>";
            }

            echo "<li class='page-item'><a class='pagse-link' href='?page=<?= " . ($page < $total) ? $page : 0 . "?>'>Next</a></li> <?php else: ?>";

            echo '</nav>';
            echo '</ul>';
        }
    }
}
