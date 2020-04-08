<?php
$string = html_entity_decode(filter_input(INPUT_POST,"data",FILTER_SANITIZE_STRING));
$parametri = json_decode($string);

include_once "../Classi/Nodi.php";
$nodi = new Nodi($parametri->nodi);
echo $nodi->graficNode($parametri->type, $parametri->data);