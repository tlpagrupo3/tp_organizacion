<?php
require "../../bd/conexion.php";
header('Access-Control-Allow-Origin: *');
$sql='Select * From miembros.usuarios join miembros.miembros using (id_miembros) join miembros.nivel_acceso using (id_nivel_acceso)';
$stmt= $conexion->query($sql);
$usuarios=$stmt->fetchAll(PDO::FETCH_OBJ);


echo json_encode($usuarios);






?>