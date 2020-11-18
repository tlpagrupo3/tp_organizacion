<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql="Select * from publicaciones.noticias where autorizacion ='n'";
$stmt=$conexion->query($sql);
$noticias=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($noticias);
?>