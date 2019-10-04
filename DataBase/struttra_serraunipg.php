<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 05/03/2019
 * Time: 09:28
 */
$pdo = null;
$host = "localhost";
$user = "root";
$password = "Francigobbi.03";
$db = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE serraunipg");
} catch (PDOException $e) {
    echo("Connection failed: " . $e->getCode());
}
$pdo = null;

$db = "serraunipg";

$utenti =  "CREATE TABLE utenti ("
    . "username VARCHAR(255) PRIMARY KEY,"
    . "nome VARCHAR(255),"
    . "cognome VARCHAR(255),"
    . "email VARCHAR(255),"
    . "pwd VARCHAR(255),"
    . "flag_admin INT NOT NULL DEFAULT '0',"
    . "flag_npwd int(11) NOT NULL DEFAULT '0'"
    . ")";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec($utenti);
} catch (PDOException $e) {
   echo("Connection failed: " . $e->getCode());
}
$pdo = null;