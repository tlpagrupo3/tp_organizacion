<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from miembros.localidad join miembros.departamento using (id_departamento) join miembros.provincia using (id_provincia)';
$stmt=$conexion->query($sql);
$localidades=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($localidades);
?>