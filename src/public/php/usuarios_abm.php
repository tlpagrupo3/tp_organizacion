<?php
require '../bd/conexion.php';
$accion=$_POST['accion'];
class usuarios {

    public $conexion;
    private $id_usuarios;
    private $nombre_usuario;
    private $contrasena;
    private $email_recuperacion;
    private $id_nivel_acceso;
    private $id_miembros;

    public function __construct($conexion,$_POST){
        
        $this->conexion=$conexion;
        $this->id_usuarios=$_POST['id_usuarios'];
        $this->nombre_usuario=$_POST['nombre_usuario'];
        $this->contrasena=$_POST['contrasena'];
        $this->email_recuperacion=$_POST['email_recuperacion'];
        $this->id_nivel_acceso=$_POST['id_nivel_acceso'];
        $this->id_miembros=$_POST['id_miembros'];
    }

    public function agregarUsuario($accion){
        try {
            //code...
        
            if ($accion=='agregar') {
                # code...
                $sql='INSERT INTO miembros.usuarios(
                    nombre_usuario
                    , contrasena
                    , email_recuperacion
                    , id_nivel_acceso
                    , id_miembros)
                    VALUES ( :nombre_usuario
                            ,:contrasena
                            ,:email_recuperacion
                            ,:id_nivel_acceso
                            ,:id_miembros); ';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                    ,':contrasena'=>$this->contrasena
                                    ,':email_recuperacion'=>$this->email_recuperacion
                                    ,':id_nivel_acceso'=>$this->id_nivel_acceso
                                    ,':id_miembros'=>$this->id_miembros));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('El usuario se registró correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                }
            }
        } catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un problema, intente mas tarde: '.$e);
        }

    }
    public function modificarUsuario($accion){
        try {
            //code...
            if ($accion=='modificar') {
                # code...
                $sql='UPDATE miembros.usuarios
                SET nombre_usuario=:nombre_usuario
                    , contrasena=:contrasena
                    , email_recuperacion=:email_recuperacion
                    , id_nivel_acceso=:id_nivel_acceso
                    , id_miembros=:id_miembros
                WHERE id_usuarios=:id_usuarios;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                    ,':contrasena'=>$this->contrasena
                                    ,':email_recuperacion'=>$this->email_recuperacion
                                    ,':id_nivel_acceso'=>$this->id_nivel_acceso
                                    ,':id_miembros'=>$this->id_miembros
                                    ,':id_usuarios'=>$this->id_usuarios));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('El usuario se modificó correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                }
            }

        } catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un problema, intente mas tarde: '.$e);
        }
    }
    public function eliminarUsuario($accion){
        try {
            //code...
            if ($accion=='eliminar') {
                # code...
                $sql='DELETE FROM miembros.usuarios
                WHERE id_usuarios=:id_usuarios;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':id_usuarios'=>$this->id_usuarios));
                if ($stmt->rowCount==1) {
                    # code...
                    echo json_encode('El usuario se eliminó correctamente');
                }else{
                    echo json_encode('No se pudo eliminar al usuario, intente mas tarde');
                }
            }
        } catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }
}

$usuario= new usuarios($conexion,$_POST);

$usuario->agregarUsuario($accion);
$usuario->modificarUsuario($accion);
$usuario->eliminarUsuario($accion);
?>