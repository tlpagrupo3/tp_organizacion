<?php
require '../../bd/conexion.php';

$sql="SELECT id_nivel_acceso, nivel_acceso, codigo_acceso
FROM miembros.nivel_acceso;";
$stmt=$conexion->query($sql);
$niveles=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($niveles);

?>