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

$utenti =  "CREATE TABLE utenti (
  username VARCHAR(255) NOT NULL PRIMARY KEY,
  nome VARCHAR(255) DEFAULT NULL,
  cognome VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  pwd VARCHAR(255) DEFAULT NULL,
  flag_admin INT(11) NOT NULL DEFAULT '0',
  flag_newpwd INT(11) NOT NULL DEFAULT '0'
)";

$vaso = "CREATE TABLE vaso (
  id_vaso INT PRIMARY KEY AUTO_INCREMENT,
  pianta VARCHAR(255),
  descrizione VARCHAR(255),
  device_eui VARCHAR(255),
  app_eui VARCHAR(255),
  device_address VARCHAR(255),
  ns_key VARCHAR(255),
  as_key VARCHAR(255)
)";

$sensore = "CREATE TABLE sensore(
  id_lettura INT PRIMARY KEY AUTO_INCREMENT,
  data DATE,
  ora TIME,
  valore VARCHAR(255),
  flag_centrale INT NOT NULL DEFAULT '0',
  type_sensor INT NOT NULL,
  id_vaso INT DEFAULT NULL,
  FOREIGN KEY(id_vaso) REFERENCES vaso(id_vaso)
)";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec($utenti);
    $pdo->exec($vaso);
    $pdo->exec($sensore);
} catch (PDOException $e) {
   echo("Connection failed: " . $e->getCode());
}
$pdo = null;