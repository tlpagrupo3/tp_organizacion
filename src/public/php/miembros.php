<?php
require "../bd/conexion.php";
$sql='Select * From miembros.miembros';
$stmt= $conexion->query($sql);
$stmt->fetchAll(PDO::FETCH_OBJ);


echo json_encode($stmt);






?>