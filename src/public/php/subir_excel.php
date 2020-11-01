<?php

require '../bd/conexion.php';
//require '../bd/conexion.php';

$tabla= $_POST['tabla'];
$archivo= $_POST['archivo'];
$sql='COPY :tabla from :archivo';
$stmt= $conexion->prepare($sql);
$stmt->execute(array(':tabla'=>$tabla
                    ,':archivo'=>$archivo));



?>