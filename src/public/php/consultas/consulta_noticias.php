<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql="Select * from publicaciones.noticias where autorizacion ='s'";
$stmt=$conexion->query($sql);
$noticias=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($noticias);
?>