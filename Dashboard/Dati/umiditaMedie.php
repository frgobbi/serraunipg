<?php
include_once "../../pdo.php";
$pdo = connessione_normale();
try {
    $sql = "SELECT AVG(valore) AS valore FROM sensore WHERE flag_centrale = '0' AND type_sensor='0' GROUP BY(hour(ora))";
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;
echo "{ \"data1\":[30, 200, 100, 400, 150, 250] }";
/*
 * {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 130, 100, 140, 200, 150, 50]
        ],
        type: 'spline'
    }
*/
