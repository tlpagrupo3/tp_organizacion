<?php
require '../../bd/conexion.php';
$fecha= date('Y-m-d');
print_r($fecha);
$sql="Select * from publicaciones.actividades join miembros.usuarios on (id_usuario=id_usuarios) left join miembros.miembros using (id_miembros) where autorizacion ='s' and fecha > '".$fecha."'::date order by fecha desc";
$stmt=$conexion->query($sql);
$actividades=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($actividades);
// ".$añoActual."-".$mesActual."-".$diaActual."
?>