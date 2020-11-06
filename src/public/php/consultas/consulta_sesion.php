<?php
require '../../bd/conexion.php';
session_start();
echo json_encode($_SESSION);

?>