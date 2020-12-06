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
    private $nombre;
    private $apellido;

    public function __construct($conexion){
        
        $this->conexion=$conexion;
        $this->id_usuarios=$_POST['id_usuarios'];
        $this->nombre_usuario=$_POST['nombre_usuario'];
        $this->contrasena=$_POST['contrasena'];
        $this->email_recuperacion=$_POST['email_recuperacion'];
        $this->id_nivel_acceso=$_POST['id_nivel_acceso'];
        $this->id_miembros=$_POST['id_miembros'];
        $this->nombre= $_POST['nombre'];
        $this->apellido= $_POST['apellido'];
    }

    public function agregarUsuario($accion){
        try {
            //code...
            
            if ($accion=='agregar') {
                # code...
                $this->conexion->beginTransaction();
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
                    $this->conexion->rollBack();
                }
                $this->conexion->commit();
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
                $this->conexion->beginTransaction();
                $sql='UPDATE miembros.usuarios
                SET nombre_usuario=:nombre_usuario
                    , email_recuperacion=:email_recuperacion
                    , id_nivel_acceso=:id_nivel_acceso
                    , id_miembros=:id_miembros
                WHERE id_usuarios=:id_usuarios;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                    ,':email_recuperacion'=>$this->email_recuperacion
                                    ,':id_nivel_acceso'=>$this->id_nivel_acceso
                                    ,':id_miembros'=>$this->id_miembros
                                    ,':id_usuarios'=>$this->id_usuarios));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('El usuario se modificó correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                    $this->conexion->rollBack();
                }
                $this->conexion->commit();
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
                $this->conexion->beginTransaction();
                $sql='DELETE FROM miembros.usuarios
                WHERE id_usuarios=:id_usuarios;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':id_usuarios'=>$this->id_usuarios));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('El usuario se eliminó correctamente');
                }else{
                    echo json_encode('No se pudo eliminar al usuario, intente mas tarde');
                    $this->conexion->rollBack();
                }
                $this->conexion->commit();
            }
        } catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }
    function buscarUsuario($accion){
        try {
            //code...
            if ($accion=='buscar') {
                # code...
                if ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                    $sql='SELECT * from miembros.usuarios
                    where email_recuperacion=:email_recuperacion
                    and id_nivel_acceso=:id_nivel_acceso
                    and nombre= :nombre
                    and apellido=:apellido';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion
                                    ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->id_nivel_acceso!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario                        
                        and id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->id_nivel_acceso!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='' && $this->id_nivel_acceso!='' ) {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and id_miembros=:id_miembros
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->id_nivel_acceso!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso
                        and id_miembros=:id_miembros
                        and nombre= :';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->id_nivel_acceso!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and id_nivel_acceso=:id_nivel_acceso
                        and id_miembros=:id_miembros
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->id_nivel_acceso!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!=''&& $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre!=''&& $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre= :nombre
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array());
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->email_recuperacion!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and email_recuperacion=:email_recuperacion';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->id_nivel_acceso!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and id_nivel_acceso=:id_nivel_acceso';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->id_nivel_acceso!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and id_nivel_acceso=:id_nivel_acceso';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion
                                        ,':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->id_nivel_acceso!='' && $this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where id_nivel_acceso=:id_nivel_acceso
                        and nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->id_nivel_acceso!='' && $this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where id_nivel_acceso=:id_nivel_acceso
                        and apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre_usuario!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre_usuario=:nombre_usuario';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->email_recuperacion!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where email_recuperacion=:email_recuperacion';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':email_recuperacion'=>$this->email_recuperacion));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->id_nivel_acceso!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where id_nivel_acceso=:id_nivel_acceso';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':id_nivel_acceso'=>$this->id_nivel_acceso));
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->nombre!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where nombre= :nombre';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array());
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }elseif ($this->apellido!='') {
                    # code...
                
                    $sql='SELECT * from miembros.usuarios
                        where apellido=:apellido';
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array());
                    $repuesta= $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($repuesta);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

$usuario= new usuarios($conexion);

$usuario->agregarUsuario($accion);
$usuario->modificarUsuario($accion);
$usuario->eliminarUsuario($accion);
?>