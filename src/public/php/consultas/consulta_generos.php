<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.tipo_genero';
$stmt=$conexion->query($sql);
$generos=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($generos);
?>