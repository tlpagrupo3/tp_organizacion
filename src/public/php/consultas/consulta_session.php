<?php
session_start();
header('Access-Control-Allow-Origin: *');
$datos=$_SESSION;
echo json_encode($datos);
?>

