<?php
require '../../bd/conexion.php';
header('Access-Control-Allow-Origin: *');
$sql='SELECT * from miembros.miembros

    join miembros.tipo_documento using (id_tipo_documento) 
    join miembros.tipo_genero using (id_tipo_genero) 
    join miembros.tipo_origen using(id_tipo_origen) 
    join miembros.actividad_economia_popular using (id_actividad_economia_popular) 
    join miembros.linea_programa using (id_linea_programa)
    join miembros.domicilio using (id_miembros)
    join miembros.localidad using (id_localidad)
    join miembros.departamento using (id_departamento)
    join miembros.provincia using (id_provincia)';
$stmt=$conexion->query($sql);
$miembros=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($miembros);
?>