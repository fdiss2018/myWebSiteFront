<?php
session_start();
include_once "./controler.php";

$MyControler = new Controler();
$MyControler->main(); 
?>
