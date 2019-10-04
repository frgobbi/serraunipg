<?php
include_once "../../pdo.php";
$pdo = connessione_normale();
$ogg = NULL;
try {
    $sql = "SELECT * FROM `sensore` WHERE flag_centrale = '0' AND type_sensor = '0' AND sensore.data = (SELECT MAX(sensore.data) FROM sensore WHERE flag_centrale = '0' AND type_sensor = '0') AND sensore.ora = (SELECT MAX(sensore.ora) FROM sensore WHERE flag_centrale = '0' AND type_sensor = '0')";
    $ogg = $pdo->query($sql)->fetch(PDO::FETCH_OBJ);
    echo $ogg->valore;
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;

