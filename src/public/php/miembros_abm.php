<?php
require "../bd/conexion.php";
$accion=$_POST['accion'];
$id_miembro=$_POST['id_miembro'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$id_tipo_documento= $_POST['id_tipo_documento'];
$id_tipo_genero= $_POST['id_tipo_genero'];
$cuil=$_POST['cuil'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$numero_documento=$_POST['numero_documento'];
$numero_telefono=$_POST['nuemro_telefono'];
$email=$_POST['email'];
$id_tipo_origen=$_POST['id_tipo_origen'];
$oficio=$_POST['oficio'];
$id_actividad_popular=$_POST['id_actividad_popular'];
$monotributo=$_POST['monotributo'];
$id_linea_programa=$_POST['id_linea_programa'];
$codigo_postal=$_POST['codigo_postal'];

if (isset($accion)) {
    switch ($accion) {
        case 'agregar':
            # code...
            

            break;
        case 'modificar':
            # code...
            break;
        case 'eliminar':
            # code...
            break;
                    
        default:
            # code...
            break;
    }
}




$sql='Select * From miembros.miembros';
$stmt= $conexion->query($sql);
$stmt->fetchAll(PDO::FETCH_OBJ);


echo json_encode($stmt);






?>