<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 05/03/2019
 * Time: 09:27
 */

$pwd = "123456";
$pwd_cript = password_hash($pwd, PASSWORD_BCRYPT);


$utenti = "INSERT INTO utenti (username, nome, cognome, email, pwd,flag_admin, flag_newpwd) VALUE ('admin','admin','admin','admn@admin.it','$pwd_cript','1','0')";

include_once "../pdo.php";
$pdo = connessione_normale();
try{
    $pdo->exec($utenti);
} catch (PDOException $e){
    echo $e->getMessage();
}
$pdo = null;