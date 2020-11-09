<?php 
require '../bd/conexion.php';

$nombre_usuario= $_POST['nombre_usuario'];
$contrasena= $_POST['contrasena'];


$sql= 'Select * from miembros.usuarios where contrasena= :contrasena and nombre_usuario= :nombre_usuario';
$stmt= $conexion->prepare($sql);
$stmt->execute(array(':nombre_usuario'=>$nombre_usuario
                    , ':contrasena'=>$contrasena));


if($stmt->rowCount()==1){
    $_SESSION['nombre']=$nombre_usuario;
    $_SESSION['apellido']=$nombre_usuario;
    $_SESSION['id_nivel_acceso']=$nombre_usuario;
    $_SESSION['id_tipo_genero']=$nombre_usuario;
    header('location: ../modulos/landing/');
}else{
    echo json_encode('El usuario o la contraseña son erroneos');
    
}




?>