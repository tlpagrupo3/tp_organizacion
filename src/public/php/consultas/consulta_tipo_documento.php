<?php
require '../../bd/conexion.php';

$sql='Select * from miembros.tipo_documento';
$stmt=$conexion->query($sql);
$tipo_documento=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($tipo_documento);
?>