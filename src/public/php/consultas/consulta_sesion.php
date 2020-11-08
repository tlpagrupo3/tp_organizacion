<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
session_start();
echo json_encode($_SESSION);

?>