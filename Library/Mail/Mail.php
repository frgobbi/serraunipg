<?php
include_once 'PHPmailer/PHPMailerAutoload.php';
include_once '../../pdo.php';

class Mail
{
    private $mail;
    private $pdo;

    public function __construct()
    {
        $this->pdo = null;
        $this->mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                                     // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'grupposerra.unipg@gmail.com';      // SMTP username
        $this->mail->Password = 'pwdserra';                         // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                    // TCP port to connect to
        $this->mail->setFrom('grupposerra.unipg@gmail.com', 'Gruppo Serra');
    }

    /**
     * @param $mail
     * @return int
     */
    public function mailForgotPwd($mail)
    {
        /* ESITI
         *  0 MAIL INVIATA
         *  1 MAIL NON INVIATA
         *  2 EMAIL NON ESISTE
        */
        $esito = 0;
        $this->pdo = connessione_normale();
        $oggU = null;
        try {
            $sql = "SELECT * FROM utenti WHERE email = '$mail'";
            //echo $sql."<br>";
            $oggU = $this->pdo->query($sql)->fetch(PDO::FETCH_OBJ);
            //print_r($oggU);
            if ($oggU != NULL) {
                $this->pdo->exec("UPDATE utenti SET flag_npwd = '1' WHERE username = '$oggU->username'");
                $body = $this->bodyForgotPwd($oggU->nome, $oggU->cognome, $oggU->username);
                $this->mail->addAddress($mail, $oggU->cognome . " " . $oggU->nome);         // Add a recipient
                $this->mail->isHTML(true);                                  // Set email format to HTML
                $this->mail->Subject = "Reimposta password";
                $this->mail->Body = $body;
                if (!$this->mail->send()) {
                    $esito = 1;
                }
            } else {
                $esito = 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->pdo = null;
        //echo $esito;
        return $esito;
    }

    private function bodyForgotPwd($nome, $cognome, $id_utente)
    {
        $keyUtente = "user:" . $id_utente . "__";
        $KutenteCrypt = password_hash($keyUtente, PASSWORD_BCRYPT);
        $dominio = $_SERVER['SERVER_NAME'];
        $url = "$dominio" . "/public/changePwd.php?hhere=$KutenteCrypt";
        $str = "<p style=\"text-align: center;\">"
            . "<span style=\"font-size: 18pt; font-family: georgia, palatino;\">Recupero dati utente</span>"
            . "</p>"
            . "<p style=\"text-align: left;\">"
            . "<span style=\"font-size: 12pt; font-family: georgia, palatino;\">"
            . "Gentile $nome $cognome,<br/>il suo username &egrave; $id_utente,"
            . "&nbsp;per recuperare la password clicchi il bottone sottostante"
            . "</span>"
            . "</p>"
            . "<p style=\"text-align: center;\">"
            . "<a href='$url'><button style=\"width: 300px; height: 70px; color: #fff; background-color: #337ab7; border-color: #2e6da4; border-radius: 15px; font-size: 18px;\">Reimposta Password</button></a></p>";
        return $str;
    }
}
