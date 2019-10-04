<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 05/03/2019
 * Time: 09:29
 */
session_start();
session_destroy();
echo "<script type='text/javascript'>window.location.href='../index.php';</script>";