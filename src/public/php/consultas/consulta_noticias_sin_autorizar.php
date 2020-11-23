<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql="Select * from publicaciones.noticias join miembros.usuarios on (id_usuario=id_usuarios) left join miembros.miembros using (id_miembros) where autorizacion ='n'";
$stmt=$conexion->query($sql);
$noticias=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($noticias);
?>