<?php

require '../bd/conexion.php';
$accion=$_POST['accion'];
class actividad{

    public $conexion;
    private $titular;
    private $descripcion;
    private $imagen;
    private $epigrafe;
    private $fecha;
    private $id_usuario;
    private $id_actividades;
    private $autorizacion;

    public function __construct($conexion,$_POST){
        
        $this->conexion= $conexion;
        $this->titular= $_POST['titular'];
        $this->descripcion= $_POST['descripcion'];
        $this->imagen= $_POST['imagen'];
        $this->epigrafe= $_POST['epigrafe'];
        $this->fecha= $_POST['fecha'];
        $this->id_usuario= $_POST['id_usuario'];
        $this->id_actividades=$_POST['id_actividades'];
        $this->autorizacion=$_POST['autorizacion'];

    }

    public function agregarActividad($accion){
        if ($accion='agregar') {
            # code...
            try {
                //code...
                $sql='INSERT INTO pubicaciones.actividades(
                     titular
                    , descripcion
                    , imagen
                    , epigrafe
                    , fecha
                    , id_usuario)
                    VALUES ( :titular
                            ,:descripcion
                            ,:imagen
                            ,:epigrafe
                            ,fecha
                            ,id_usuario);';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':titular'=>$this->titular
                                    ,':descripcion'=>$this->descripcion
                                    ,':imagen'=>$this->imagen
                                    ,':epigrafe'=>$this->epigrafe
                                    ,':fecha'=>$this->fecha
                                    ,':id_usuario'=>$this->id_usuario));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('La actividad se agregó correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }
    public function modificarActividad($accion){
        if ($accion=='modificar') {
            # code...
            try {
                //code...
                $sql='UPDATE pubicaciones.actividades
                SET titular=:titular
                    , descripcion=:descripcion
                    , imagen=:imagen
                    , epigrafe=:epigrafe
                    , fecha=:fecha
                    , id_usuario=:id_usuario
                WHERE id_actividades=:id_actividades;';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':titular'=>$this->titular
                                    ,':descripcion'=>$this->descripcion
                                    ,'imagen'=>$this->imagen
                                    ,':epigrafe'=>$this->epigrafe
                                    ,':fecha'=>$this->fecha
                                    ,':id_usuario'=>$this->id_usuario
                                    ,':id_actividades'=>$this->id_actividades));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('La actividad se modificó correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }
    public function autorizarActividad($accion){
        if ($accion=='autorizar') {
            # code...
            try {
                //code...
                $sql='UPDATE pubicaciones.actividades
                SET autorizacion=:autorizacion
                WHERE id_actividades=:id_actividades;';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array('autorizacion'=>$this->autorizacion
                                    ,'id_actividades'=>$this->id_actividades));
                if ($stmt->rowCount==1) {
                    # code...
                    echo json_encode('La actividad se autorizó correctamente');
                }else{
                    echo json_encode('No se pudo actualizar la noticia, intente mas tarde');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }

}

$actividad= new actividad($conexion,$_POST);

$actividad->agregarActividad($accion);
$actividad->modificarActividad($accion);
$actividad->autorizarActividad($accion);


?>