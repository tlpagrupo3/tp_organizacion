<?php
require '../bd/conexion.php';
error_reporting(E_ALL ^ E_NOTICE);
class post {
    protected $conexion;
    private $imagen;
    private $posteo;
    private $fecha;

    function __construct($conexion){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $this->conexion= $conexion;
        $this->imagen= $_FILES['imagen'];
        $this->posteo= $_POST['posteo'];
        $this->fecha= date('Y-m-d H:i:s');
    }
    function nuevoPost(){
        try {
            //code...
            function validarImagen($imagen){
                $tipo= $imagen['type'];
                $nombre= $imagen['name'];

                if ($tipo == "image/jpg"||$tipo == "image/jpeg"||$tipo == "image/png"||$tipo == "image/gif") {
                    # code...
                    move_uploaded_file($imagen['tmp_name'],'../media/'.$nombre);
                }
            }
            validarImagen($this->imagen);
            $this->conexion->beginTransaction();
            $sql="INSERT INTO publicaciones.posteos_landing(
                imagen, posteo, fecha)
                VALUES ( :imagen, :posteo, :fecha);";
            $stmt= $this->conexion->prepare($sql);
            $stmt->execute(array(':imagen'=>'../../media/'.$this->imagen['name']
                                ,':posteo'=>$this->posteo
                                ,':fecha'=>$this->fecha));
            if ($stmt->rowCount()==1) {
                # code...
                $this->conexion->commit();
                echo json_encode('Posteo cargado correctamente');
                exit;

            }else{
                $this->conexion->rollBack();
                echo json_encode('El posteo no pude ser guardado, intente más tarde');
            }

        } catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, Intente más tarde: '.$e);
        }
    }
}

$nuevo_post = new post($conexion);
$nuevo_post->nuevoPost();
?>