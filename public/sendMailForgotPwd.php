<?php
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
include_once "../Library/Mail/Mail.php";
$oggMail = new Mail();

$esito = $oggMail->mailForgotPwd($email);
echo $esito;