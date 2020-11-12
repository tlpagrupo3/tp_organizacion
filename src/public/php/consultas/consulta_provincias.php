<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.provincia';
$stmt=$conexion->query($sql);
$provincias=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($provincias);
?>