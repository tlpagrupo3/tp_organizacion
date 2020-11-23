<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='Select * from documentacion.tipo_documento';
$stmt=$conexion->query($sql);
$tipo_documento=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($tipo_documento);
?>