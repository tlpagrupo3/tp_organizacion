<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$id=$_POST['id'];
$sql='SELECT * from miembros.departamento join miembros.provincia using (id_provincia) where id_provincia='.$id;
$stmt=$conexion->query($sql);
$departamentos=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($departamentos);
?>