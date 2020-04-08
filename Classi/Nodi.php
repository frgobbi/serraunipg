<?php


class Nodi
{
    private $nodi;

    public function __construct($arrayNodi = NULL)
    {
        $this->nodi = array();
        include_once "../pdo.php";
        $pdo = connessione_normale();
        try{
            include_once "../Classi/Nodo.php";
            foreach ($pdo->query("SELECT * FROM vaso") as $row){
                if($arrayNodi != NULL && count($arrayNodi)>0){
                    $trovato = 0;
                    for($i=0;$i<count($arrayNodi);$i++){
                        if($arrayNodi[$i]==$row['id_vaso']){
                            $trovato = 1;
                        }
                    }
                    if($trovato == 1){
                        $n = new Nodo($row['id_vaso']);
                        $n->setDati();
                        $this->nodi[]= $n;
                        $n = null;
                    }

                } else {
                    $n = new Nodo($row['id_vaso']);
                    $n->setDati();
                    $this->nodi[]= $n;
                    $n = null;
                }

            }
        } catch (PDOException $pdoe){
            echo $pdoe->getMessage();
        }
        $pdo = null;
    }

    public function graficNode($typeSensor, $data){
        $s = "{";
            $s .= "\"nodi\": [";
                if(count($this->nodi)>0){
                    $s .= $this->nodi[0]->jsonGraphic($typeSensor, $data);
                    for($i=1;$i<count($this->nodi);$i++){
                        $s .= ",".$this->nodi[$i]->jsonGraphic($typeSensor,$data);
                    }
                }
            $s .= "]";
        $s .= "}";
        return $s;
    }

}