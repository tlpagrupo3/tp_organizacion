<?php
require '../../bd/conexion.php';

$sql="Select * from publicaciones.noticias join miembros.usuarios on (id_usuario=id_usuarios) left join miembros.miembros using (id_miembros) where autorizacion ='s' order by fecha desc";
$stmt=$conexion->query($sql);
$actividades=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($actividades);
?>