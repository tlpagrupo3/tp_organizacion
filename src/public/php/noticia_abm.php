<?php

require '../bd/conexion.php';
$accion=$_POST['accion'];
class noticia {
    
    public $conexion;
    private $volanta;
    private $titular;
    private $copete;
    private $cuerpo;
    private $imagen;
    private $epigrafe;
    private $fecha;
    private $id_usuario;
    private $autorizacion;
    private $id_noticias;

    public function __construct($conexion,$_POST){
        
        $this->conexion=$conexion;
        $this->volanta=$_POST['volanta'];
        $this->titular=$_POST['titular'];
        $this->copete=$_POST['copete'];
        $this->cuerpo=$_POST['cuerpo'];
        $this->imagen=$_POST['imagen'];
        $this->epigrafe=$_POST['epigrafe'];
        $this->fecha=$_POST['fecha'];
        $this->id_usuario=$_POST['id_usuario'];
        $this->autorizacion=$_POST['autorizacion'];
        $this->id_noticias=$_POST['id_noticias'];
    }

    public function nuevaNoticia($accion){
        if ($accion=='agragar') {
            # code...
            
            try {
                //code...
                $sql='INSERT INTO pubicaciones.noticias(
                    volanta
                    , titular
                    , copete
                    , cuerpo
                    , epigrafe
                    , imagen
                    , fecha
                    , id_usuario)
                    VALUES ( :volanta
                            ,:titular
                            ,:copete
                            ,:cuerpo
                            ,:epigrafe
                            ,:imagen
                            ,:fecha
                            ,:id_usuario);';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':valanta'=>$this->volanta
                                    ,':titular'=>$this->titular
                                    ,':copete'=>$this->copete
                                    ,':cuerpo'=>$this->cuerpo
                                    ,':epigrafe'=>$this->epigrafe
                                    ,':imagen'=>$this->imagen
                                    ,':fecha'=>$this->fecha
                                    ,':id_usuario'=>$this->id_usuario));
                if ($stmt->rowCount==1) {
                    # code...
                    echo json_encode('La noticia se agregó correctamente');
                }else{
                    echo json_encode('Hay campos vacios o erroneos');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }

    public function modificarNoticia($accion){
        if ($accion=='modificar') {
            # code...
            try {
                //code...
                $sql='UPDATE pubicaciones.noticias
                SET volanta=:volanta
                    , titular=:titular
                    , copete=:copete
                    , cuerpo=:cuerpo
                    , epigrafe=:epigrafe
                    , imagen=:imagen
                    , fecha=:fecha
                    , id_usuario=:id_usuario
                    
                WHERE id_noticias=:id_noticias;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':volanta'=>$this->volanta,
                                    ,':titular'=>$this->titular
                                    ,':copete'=>$this->copete
                                    ,':cuerpo'=>$this->cuerpo
                                    ,':epigrafe'=>$this->epigrafe
                                    ,':imagen'=>$this->fecha
                                    ,':id_usuario'=>$this->id_usuario
                                    ,':id_noticias'=>$this->id_noticias));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('Noticia modificada correctamente');
                }else{
                    echo json_encode('Hay campos erroneos o vacios');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }
    public function autorizarNoticia($accion){
        if ($accion=='autorizar') {
            # code...
            try {
                //code...
                $sql='UPDATE pubicaciones.noticias
                SET  autorizacion=:autorizacion
                WHERE id_noticia=:id_noticia;';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':autorizacion'=>$this->autorizacion
                                    ,':id_noticia'=>$this->id_noticias));
                if ($stmt->rowCount()==1) {
                    # code...
                    echo json_encode('La noticia se autorizó correctamente');
                }else{
                    echo json_encode('No se pudo autorizar la notica, intente mas tarde');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }
    public function eliminarNoticia($accion){
        if($accion=='eliminar'){
            try {
                //code...
                $sql='DELETE FROM pubicaciones.noticias
                WHERE id_noticias=:id_noticias;';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':id_noticias'=>$this->id_noticias));
                if($stmt->rowCount==1){
                    echo json_encode('El usuario se eliminó correctamente');
                }else{
                    echo json_encode('El usuario no pudo eliminarse, intente mas tarde');
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }
    }
}

$noticia= new noticia($conexion,$_POST);
$noticia->nuevaNoticia($accion);
$noticia->modificarNoticia($accion);
$noticia->autorizarNoticia($accion);
?>