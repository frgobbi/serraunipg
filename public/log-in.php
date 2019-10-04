<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 05/03/2019
 * Time: 09:29
 */

/*
 * ESITI:
 * - 0 => LOG ESATTO
 * - 1 => PWD ERRATA
 * - 2 => UTENTE INESISTENTE
 */
session_start();
$id_utente = filter_input(INPUT_POST, "id_utente",FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST,"pwd", FILTER_SANITIZE_STRING);
$esito = 4;
include_once "../Classi/Utente.php";
$utente = new utente($id_utente);
$esiste = $utente->isUtente();
if($esiste == true){
    $utente->setDati();
    if($utente->verifyPassword($pwd)){
        $_SESSION['login']= true;
        $_SESSION['id_utente'] = $id_utente;
        $_SESSION['flag_admin']= $utente->getFlagA();
        $esito = 0;
    } else {
        $esito = 1;
    }
} else {
    $esito = 2;
}
echo $esito;
