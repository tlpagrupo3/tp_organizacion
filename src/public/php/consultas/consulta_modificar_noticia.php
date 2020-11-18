<?php
require '../../bd/conexion.php';

$id_noticias=$_POST['id_noticias'];
$sql="Select * from publicaciones.noticias where id_noticias= :id_noticias";
$stmt=$conexion->prepare($sql);
$stmt->execute(array(':id_noticias'=>$id_noticias));
$noticias=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($noticias);
?>