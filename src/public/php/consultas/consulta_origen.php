<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.tipo_origen';
$stmt=$conexion->query($sql);
$origen=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($origen);
?>