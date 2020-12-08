<?php
require '../bd/conexion.php';
$accion= $_POST['accion'];
error_reporting(E_ALL ^ E_NOTICE);
class documento {

    public $conexion;
    private $id_documento;
    private $id_tipo_documento;
    private $documento_nombre;
    private $documento_intervinientes;
    private $tipo_documento;
    private $documento_tema;
    private $documento_fecha;
    private $id_localidad;
    private $id_usuarios;
    private $id_miembros;
    private $documento_direccion;
    private $archivo;

    function __construct($conexion){

        $this->conexion= $conexion;
        $this->id_documento= $_POST['id_documento'];
        $this->id_tipo_documento= $_POST['id_tipo_documento'];
        $this->documento_nombre= $_POST['documento_nombre'];
        $this->tipo_documento= $_POST['tipo_documento'];
        $this->documento_tema= $_POST['documento_tema'];
        $this->documento_intervinientes= $_POST['documento_intervinientes'];
        $this->documento_fecha= $_POST['documento_fecha'];
        $this->documento_direccion= $_POST['documento_direccion'];
        $this->id_usuarios= $_POST['id_usuarios'];
        $this->id_miembros= $_POST['id_miembros'];
        $this->id_localidad= $_POST['id_localidad'];
        $this->archivo= $_FILES['archivo'];

    }
    function agregarDocumento($accion){
        if ($accion=='agregar') {
            # code...
            try {
                //code...
                $this->conexion->beginTransaction();
                function validarImagen($archivo){
                    $tipo= $archivo['type'];
                    $nombre= $archivo['name'];
    
                    if ($tipo == "image/jpg"
                    ||$tipo == "image/jpeg"
                    ||$tipo == "image/png"
                    ||$tipo == "image/gif"
                    ||$tipo == "application/pdf"
                    ||$tipo == "application/csv"
                    ||$tipo == "application/txt"
                    ||$tipo == "application/doc"
                    ||$tipo == "application/docx"
                    ||$tipo == "application/xls"
                    ||$tipo == "application/xlsx"
                    ||$tipo == "application/ppt"
                    ||$tipo == "application/pptx"
                    //||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"
                    ) {
                        # code...
                        move_uploaded_file($archivo['tmp_name'],'../../archivo/'.$nombre);
                    }
                }
                validarImagen($this->archivo);
                $sql='INSERT INTO documentacion.documento(
                                    documento_nombre
                                    , documento_fecha
                                    , documento_intervinientes
                                    , documento_direccion
                                    , id_localidad
                                    , id_usuarios
                                    , id_miembros
                                    , documento_tema
                                    , id_tipo_documento)
                                    VALUES ( :documento_nombre
                                    , :documento_fecha
                                    , :documento_intervinientes
                                    , :documento_direccion
                                    , :id_localidad
                                    , :id_usuarios
                                    , :id_miembros
                                    , :documento_tema
                                    , :id_tipo_documento);';
            
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':documento_nombre'=>$this->documento_nombre
                                        ,':documento_fecha'=>$this->documento_fecha
                                        ,':documento_intervinientes'=>$this->documento_intervinientes
                                        ,':documento_direccion'=>'../../archivo/'.$this->archivo['name']
                                        ,':id_localidad'=>$this->id_localidad
                                        ,':id_usuarios'=>$this->id_usuarios
                                        ,':id_miembros'=>$this->id_miembros
                                        ,':documento_tema'=>$this->documento_tema
                                        ,':id_tipo_documento'=>$this->id_tipo_documento));
                    if ($stmt->rowCount()==1) {
                        # code...
                        $this->conexion->commit();
                        echo json_encode('El documento se cargo exitosamente');
                    }else {
                        # code...
                        $this->conexion->rollBack();
                        echo json_encode('El documento no se pudo cargar, intente mas tarde');
                    }
                    
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }

        
    }
    function modificarDocumento($accion){
        if ($accion=='modificar') {
            # code...
            try {
                //code...
                $this->conexion->beginTransaction();
                function validarImagen($archivo){
                    $tipo= $archivo['type'];
                    $nombre= $archivo['name'];
    
                    if ($tipo == "image/jpg"
                    ||$tipo == "image/jpeg"
                    ||$tipo == "image/png"
                    ||$tipo == "image/gif"
                    ||$tipo == "application/pdf"
                    ||$tipo == "application/csv"
                    ||$tipo == "application/txt"
                    ||$tipo == "application/doc"
                    ||$tipo == "application/docx"
                    ||$tipo == "application/xls"
                    ||$tipo == "application/xlsx"
                    ||$tipo == "application/ppt"
                    ||$tipo == "application/pptx"
                    //||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"||$tipo == "image/gif"
                    ) {
                        # code...
                        move_uploaded_file($archivo['tmp_name'],'../../archivo/'.$nombre);
                    }
                }
                validarImagen($this->archivo);
                $sql='UPDATE documentacion.documento
                SET documento_nombre=:documento_nombre
                , documento_fecha=:documento_fecha
                , documento_intervinientes=:documento_intervinientes
                , documento_direccion=:documento_direccion
                , id_localidad=:id_localidad
                , id_usuarios=:id_usuarios
                , id_miembros=:id_miembros
                , documento_tema=:documento_tema
                , id_tipo_documento=:id_tipo_documento
                WHERE id_documento=:id_documento;';
            
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':documento_nombre'=>$this->documento_nombre
                                    ,':documento_fecha'=>$this->documento_fecha
                                    ,':documento_intervinientes'=>$this->documento_intervinientes
                                    ,':documento_direccion'=>'../../../archivo/'.$this->archivo['name']
                                    ,':id_localidad'=>$this->id_localidad
                                    ,':id_usuarios'=>$this->id_usuarios
                                    ,':id_miembros'=>$this->id_miembros
                                    ,':documento_tema'=>$this->documento_tema
                                    //,':id_tipo_documento'=>$this->id_tipo_documento,
                                    ,':id_documento'=>$this->id_documento));
                if ($stmt->rowCount()==1) {
                    # code...
                    $this->conexion->commit();
                    echo json_encode('El documento se modificó exitosamente');
                }else {
                    # code...
                    echo json_encode('El documento no se pudo modificar, intente mas tarde');
                    $this->conexion->rollBack();
                }
                
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
        }

        
    }
    function eliminarDocumento($accion){
        if ($accion=='eliminar') {
            # code...
            try {
                //code...
                $this->conexion->beginTransaction();
                $sql='DELETE FROM documentacion.documento
                WHERE id_documento=:id_documento;';
            
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->execute(array(':id_documento'=>$this->id_documento));
                    if ($stmt->rowCount()==1) {
                        # code...
                        echo json_encode('El documento se aliminó exitosamente');
                    }else {
                        # code...
                        echo json_encode('El documento no se pudo eliminar, intente mas tarde');
                    }
                    $this->conexion->commit();
            } catch (PDOException $e) {
                //throw $th;
                echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
            }
            
        }
    }

}


$documento= new Documento($conexion);
$documento->agregarDocumento($accion);
$documento->modificarDocumento($accion);
$documento->eliminarDocumento($accion);
?>