<?php
require '../../bd/conexion.php';

$sql="SELECT id_notas_version, fecha, notas_version
FROM publicaciones.notas_version;";
$stmt=$conexion->query($sql);
$notas=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($notas);

?>