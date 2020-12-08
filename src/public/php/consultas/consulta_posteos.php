<?php
require '../../bd/conexion.php';

$sql="SELECT id_posteos_landing, imagen, posteo, fecha
FROM publicaciones.posteos_landing order by fecha desc;";
$stmt=$conexion->query($sql);
$posteos=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($posteos);

?>