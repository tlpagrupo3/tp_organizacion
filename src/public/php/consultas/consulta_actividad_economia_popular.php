<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$id=$_POST['id'];
$sql='Select * from miembros.actividad_economia_popular where id_rama_economia_popular='.$id;
$stmt=$conexion->query($sql);
$actividad_economia_popular=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($actividad_economia_popular);
?>