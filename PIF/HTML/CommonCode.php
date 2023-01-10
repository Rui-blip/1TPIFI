<?php
session_start();
if (!isset($_SESSION["UserLogged"])) {
    $_SESSION["UserLogged"] = false;
}

if (isset($_POST["logoutA"])) {
    session_unset();
    session_destroy();
    header("Location: HomeEN.php");
    die();
}

$host = "localhost";
$user = "root";
$psw = "";
$database = "DatabasePIF";
$portNo = 3306;
$connection = new mysqli($host, $user, $psw, $database, $portNo);
