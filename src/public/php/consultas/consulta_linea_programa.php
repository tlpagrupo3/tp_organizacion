<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.linea_programa';
$stmt=$conexion->query($sql);
$linea_programa=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($linea_programa);
?>