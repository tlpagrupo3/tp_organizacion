<?php
require '../../bd/conexion.php';



$sql='SELECT * from documentacion.documento join documentacion.tipo_documento using (id_tipo_documento)';
$stmt=$conexion->query($sql);
$documentos=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($documentos);
?>