<?php
require "../bd/conexion.php";
$sql='Select * From miembros.usuarios join miembros.miembros using (id_miembros)';
$stmt= $conexion->query($sql);
$stmt->fetchAll(PDO::FETCH_OBJ);


echo json_encode($stmt);






?>