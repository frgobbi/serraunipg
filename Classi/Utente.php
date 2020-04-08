<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 08/03/2019
 * Time: 10:51
 */

class utente
{
    private $username = null;
    private $nome = null;
    private $cognome = null;
    private $email = null;
    private $pwd = null;
    private $flag_admin = null;
    private $flag_newpwd = null;
    private $pdo = null;

    /**
     * utente constructor.
     * @param $username
     */
    public function __construct($username = NULL){
        $this->username = $username;
    }

    public function setDati(){
        include_once "../pdo.php";
        $this->pdo = connessione_normale();
        try{
            $ogg = $this->pdo->query("SELECT * FROM utenti WHERE username = '$this->username'")->fetch(PDO::FETCH_OBJ);
            $this->nome = $ogg->nome;
            $this->cognome = $ogg->cognome;
            $this->email = $ogg->email;
            $this->pwd = $ogg->pwd;
            $this->flag_admin = $ogg->flag_admin;
            $this->flag_newpwd = $ogg->flag_newpwd;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $this->pdo = null;
    }

    public function createUtente(){

    }

    public function isUtente(){
        $esito = false;
        include_once "../pdo.php";
        $this->pdo = connessione_normale();
        try{
            $Nutenti = $this->pdo->query("SELECT * FROM utenti WHERE username = '$this->username'")->rowCount();
            if($Nutenti > 0){
                $esito =  true;
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $this->pdo = null;
        return $esito;
    }

    public function verifyPassword($pwd){
        $esito = false;
        if (password_verify($pwd, $this->pwd)) {
            $esito = true;
        }
        return $esito;
    }

    public function getFlagA(){
        return $this->flag_admin;
    }

    public function getFlagP(){
        return $this->flag_newpwd;
    }


}