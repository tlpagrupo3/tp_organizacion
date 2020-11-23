<?php
require '../../bd/conexion.php';

$id_actividades=$_POST['id_actividades'];
$sql="Select * from publicaciones.actividades where id_actividades= :id_actividades";
$stmt=$conexion->prepare($sql);
$stmt->execute(array(':id_actividades'=>$id_actividades));
$actividades=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($actividades);
?>