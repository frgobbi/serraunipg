<?php
$id_vaso = filter_input(INPUT_POST,"pianta",FILTER_SANITIZE_STRING);
include_once "../Classi/Nodo.php";
$nodo = new Nodo($id_vaso);
$nodo->setDati();
echo $nodo->jsonRealTime();