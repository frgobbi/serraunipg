<?php


class Nodo
{
    private $id_vaso;
    private $pianta;
    private $descrizione;
    private $device_eui;
    private $app_eui;
    private $device_address;
    private $ns_key;
    private $as_key;

    public function __construct($id_vaso = null)
    {
        $this->id_vaso = $id_vaso;
    }

    public function setDati()
    {
        include_once "../pdo.php";
        $pdo = connessione_normale();
        try {
            $oggP = $pdo->query("SELECT * FROM vaso WHERE id_vaso = '$this->id_vaso'")->fetch(PDO::FETCH_OBJ);
            $this->pianta = $oggP->pianta;
        } catch (PDOException $pdoe) {
            echo $pdoe->getMessage();
        }
        $pdo = null;
    }

    public function createNodo($pianta, $descrizione, $device_eui, $app_eui, $device_address, $ns_key, $as_key)
    {
        $this->pianta = $pianta;
        $this->descrizione = $descrizione;
        $this->device_eui = $device_eui;
        $this->app_eui = $app_eui;
        $this->device_address = $device_address;
        $this->ns_key = $ns_key;
        $this->as_key = $as_key;

        include_once "../pdo.php";
        $pdo = connessione_normale();
        try {
            $sql = "INSERT INTO vaso (id_vaso, pianta, descrizione, device_eui, app_eui, device_address, ns_key, as_key) VALUES "
                . "(NULL, ':pianta',':descrizione',':device_eui',':app_eui',':device_address',':ns_key',':as_key')";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':pianta', $pianta_p);
            $stmt->bindParam(':pianta', $descrizione_p);
            $stmt->bindParam(':pianta', $device_eui_p);
            $stmt->bindParam(':pianta', $app_eui_p);
            $stmt->bindParam(':pianta', $device_address_p);
            $stmt->bindParam(':pianta', $ns_key_p);
            $stmt->bindParam(':pianta', $as_key_p);

            $pianta_p = $this->pianta;
            $descrizione_p = $this->descrizione;
            $device_eui_p = $this->device_eui;
            $app_eui_p = $this->app_eui;
            $device_address_p = $this->device_address;
            $ns_key_p = $this->ns_key;
            $as_key_p = $this->as_key;

            $stmt->execute();

        } catch (PDOException $pdoe) {
            echo $pdoe->getMessage();
        }
        $pdo = null;
    }

    public function jsonRealTime()
    {
        include_once "../pdo.php";
        $pdo = connessione_normale();
        try {
            $sqlU = "SELECT * FROM `sensore` WHERE flag_centrale = '0' AND type_sensor = '0' AND id_vaso = '$this->id_vaso' AND sensore.data LIKE ( "
                . "SELECT MAX(sensore.data) FROM sensore WHERE id_vaso = '1' AND type_sensor = '0') "
                . "AND sensore.ora = (SELECT MAX(sensore.ora) FROM sensore WHERE id_vaso ='$this->id_vaso' AND type_sensor = '0' AND sensore.data LIKE ( SELECT MAX(sensore.data) FROM sensore WHERE id_vaso = '$this->id_vaso' AND type_sensor = '1'))";
            $sqlT = "SELECT * FROM `sensore` WHERE flag_centrale = '0' AND type_sensor = '1' AND id_vaso = '$this->id_vaso' AND sensore.data LIKE ( "
                . "SELECT MAX(sensore.data) FROM sensore WHERE id_vaso = '1' AND type_sensor = '1') "
                . "AND sensore.ora = (SELECT MAX(sensore.ora) FROM sensore WHERE id_vaso ='$this->id_vaso' AND type_sensor = '1' AND sensore.data LIKE ( SELECT MAX(sensore.data) FROM sensore WHERE id_vaso = '$this->id_vaso' AND type_sensor = '1'))";

            $oggU = $pdo->query($sqlU)->fetch(PDO::FETCH_OBJ);
            $oggT = $pdo->query($sqlT)->fetch(PDO::FETCH_OBJ);

            $s = "{";
            $s .= "\"humidity\":\"" . ($oggU->valore * 100) / 3.3 . "\",";
            $s .= "\"temperature\": \"$oggT->valore\"";
            $s .= "}";

        } catch (PDOException $pdoe) {
            echo $pdoe->getMessage();
        }
        $pdo = null;
        return $s;

    }

    public function jsonGraphic($typeSensor, $data)
    {
        include_once "../pdo.php";
        $pdo = connessione_normale();
        try {
            if(strcmp($data,"")==0 ){
                $data = date('%Y-%m-%d');
            }
            //DATE_FORMAT(ora,'%H:%i') as oraF
            $sql = " SELECT valore, ora FROM sensore WHERE type_sensor = '$typeSensor' AND id_vaso = '$this->id_vaso' AND data LIKE '$data'";
            $arrayU = array();

            $arrayO = array();
            foreach ($pdo->query($sql) AS $row) {
                $arrayU[] = $row['valore'];
                $arrayO[] = $row['ora'];
            }


            $s = "{";
            $s .= "\"nome\":\"$this->pianta\",";
            $s .= "\"value\": [";
            if (count($arrayU) > 0) {
                $s .= $arrayU[0];
                for ($i = 1; $i < count($arrayU); $i++) {
                    $s .= "," . $arrayU[$i];
                }
            }
            $s .= "],";
            $s .= "\"times\": [";
            if (count($arrayO) > 0) {
                $s .= "\"".$arrayO[0]."\"";
                for ($i = 1; $i < count($arrayO); $i++) {
                    $s .= ",\"" . $arrayO[$i]."\"";
                }
            }
            $s .= "]";
            $s .= "}";

        } catch (PDOException $pdoe) {
            echo $pdoe->getMessage();
        }
        $pdo = null;
        return $s;
    }

    public function jsonOnegraphicDate()
    {

    }
}