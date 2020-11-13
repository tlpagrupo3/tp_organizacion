<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$valor ='1';
$sql='Select * from miembros.tipo_genero where id_tipo_genero=:r';
$stmt=$conexion->prepare($sql);

$stmt->execute(array(':r'=>$valor));
$generos=$stmt->fetchAll();
echo json_encode($generos);
?>