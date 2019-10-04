<?php


class Nodi
{
    private $nodi;

    public function __construct()
    {
        $this->nodi = array();
        include_once "../pdo.php";
        $pdo = connessione_normale();
        try{
            include_once "../Classi/Nodo.php";
            foreach ($pdo->query("") as $row){
                $n = new Nodo($row['id_vaso']);
                $this->nodi[]= $n;
                $n = null;
            }
        } catch (PDOException $pdoe){
            echo $pdoe->getMessage();
        }
        $pdo = null;
    }


}