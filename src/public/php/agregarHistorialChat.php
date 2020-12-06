<?php
header('Access-Control-Allow-Origin: *');
require '../bd/conexion.php';
$accion= $_POST['accion'];
error_reporting(E_ALL ^ E_NOTICE);
class Chat {
    private $id_usuarios;
    private $mensaje;
    private $id_tipo_mensaje;
    private $fecha;
    protected $conexion;
    
    function __construct($conexion){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $this->id_usuarios= $_POST['id_usuarios'];
        
        if (isset($_FILES['name'])) {
            # code...
            $this->id_tipo_mensaje=2;
            $this->mensaje='http://localhost/sadop/src/public/media/'.$_FILES['name'];
        }else{
            $this->id_tipo_mensaje=1;
            $this->mensaje= $_POST['mensaje'];
        }
        $this->fecha= date('Y-m-d H:i:s');
        $this->conexion= $conexion;
        
    }
    function agregar($accion){
        if ($accion=='agregar') {
            # code...
            try {
                //code...
                $this->conexion->beginTransaction();
                $sql='INSERT INTO chats.chat_grupal(
                    id_tipo_mensaje, mensaje, fecha, id_usuarios)
                   VALUES ( :id_tipo_mensaje, :mensaje, :fecha, :id_usuarios);';
                $stmt= $this->conexion->prepare($sql);
                $stmt->execute(array(':id_tipo_mensaje'=>$this->id_tipo_mensaje
                                    ,':mensaje'=>$this->mensaje
                                    ,':fecha'=>$this->fecha
                                    ,':id_usuarios'=>$this->id_usuarios));
                if ($stmt->rowCount()==1) {
                    # code...
                    $this->conexion->commit();
                    echo json_encode('Mensaje Guardado');
                    exit;
                }else{
                    $this->conexion->rollBack();
                    echo json_encode('El mensaje no se guardó');
                    exit;
                }
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente más tarde: '.$e);
            }
        }
    }
    function cargar($accion){
        if ($accion=='cargar') {
            # code...
            try {
                //code...
                $this->conexion->beginTransaction();
                $select='SELECT id_chat_grupal, id_tipo_mensaje, mensaje, fecha, id_usuarios, apellido, nombre
                FROM chats.chat_grupal join miembros.usuarios using(id_usuarios) join miembros.miembros using (id_miembros);';
                $stmt=$this->conexion->query($select);
                $mensajes=$stmt->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($mensajes);
                $this->conexion->commit();
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, Intente mas tarde: '.$e);
            }
        }
    }
}
$chat= new Chat($conexion);
$chat->agregar($accion);
$chat->cargar($accion);
?>