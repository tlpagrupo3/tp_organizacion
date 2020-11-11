<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.rama_economia_popular';
$stmt=$conexion->query($sql);
$rama_economia_popular=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($rama_economia_popular);
?>