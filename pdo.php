<?php
/**
 * Created by PhpStorm.
 * User: gobbi
 * Date: 12/09/2018
 * Time: 14:18
 */

function connessione_normale() {
    $pdo = null;
    $host = "localhost";
    $user = "root";
    $password = "Francigobbi.03";
    $db = "serraunipg";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch (PDOException $e) {
        /*Nel caso in cui venga lanciata un'eccezione, verrà restituito il messaggio
         * di errore corrispondente.
         */
        echo("Connection failed: " . $e->getCode());
    }
    return $pdo;
}

/*
 * $host = "178.128.42.254";
    $user = "userserra";
    $password = "pwdserra";
    $db = "serraunipg";
 * */
