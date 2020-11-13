<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$id=$_POST['id'];
$sql='Select * from miembros.localidad join miembros.departamento using (id_departamento) join miembros.provincia using (id_provincia) where id_departamento=:id';
$stmt=$conexion->prepare($sql);
$stmt->execute(array(':id'=>$id));
$localidades=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($localidades);
?>