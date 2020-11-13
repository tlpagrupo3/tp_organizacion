<?php
require "../bd/conexion.php";
$accion=$_POST['accion'];
class miembro{
    
    public $conexion;
    private $id_miembro;
    private $nombre;
    private $apellido;
    private $id_tipo_documento;
    private $id_tipo_genero;
    private $cuil;
    private $fecha_nacimiento;
    private $id_localidad;
    private $numero_documento;
    private $numero_telefono;
    private $email;
    private $id_tipo_origen;
    private $id_actividad_popular;
    private $monotributo;
    private $id_linea_programa;
    private $codigo_postal;
    private $calle;
    private $numero;
    private $municipio_alta;
    private $municipio_domicilio;


    function __construct($conexion,$_POST)
    {
        $this->conexion=$conexion;
        $this->id_miembro=$_POST['id_miembro'];
        $this->nombre= $_POST['nombre'];
        $this->apellido= $_POST['apellido'];
        $this->id_tipo_documento= $_POST['id_tipo_documento'];
        $this->id_tipo_genero= $_POST['id_tipo_genero'];
        $this->cuil=$_POST['cuil'];
        $this->fecha_nacimiento=$_POST['fecha_nacimiento'];
        $this->id_localidad=$_POST['id_localidad'];
        $this->numero_documento=$_POST['numero_documento'];
        $this->numero_telefono=$_POST['nuemro_telefono'];
        $this->email=$_POST['email'];
        $this->id_tipo_origen=$_POST['id_tipo_origen'];
        $this->oficio=$_POST['oficio'];
        $this->id_actividad_popular=$_POST['id_actividad_popular'];
        $this->monotributo=$_POST['monotributo'];
        $this->id_linea_programa=$_POST['id_linea_programa'];
        $this->codigo_postal=$_POST['codigo_postal'];
        $this->calle=$_POST['calle'];
        $this->numero=$_POST['numero'];
        $this->municipio_alta;
        $this->municipio_domicilio;
    }

    public function agregar($accion){
        try {
            //code...
        $this->conexion->beginTransaction();
        if ($accion=='agregar') {
            # code...
            $sqlMiembro='INSERT into miembros.miembros (
                 nombre
                , apellido
                , id_tipo_documento
                , id_tipo_genero
                , cuil
                , fecha_nacimiento
                , numero_documento
                , numero_telefono
                , email
                , id_tipo_origen
                , id_actividad_economia_popular
                , monotributo
                , id_linea_programa
                , codigo_postal
                , id_localidad)
                VALUES ( :nombre
                        ,:apellido
                        ,:id_tipo_documento
                        ,:id_tipo_genero
                        ,:cuil
                        ,:fecha_nacimiento
                        ,:numero_telefono
                        ,:numero_documento
                        ,:email
                        ,:id_tipo_origen
                        ,:id_actividad_economia_popular
                        ,:monotributo
                        ,:id_linea_programa
                        ,:codigo_postal
                        ,:id_localidad);';
            $stmtMiembro= $this->conexion->prepare($sqlMiembro);
            $stmtMiembro->execute(array( ':nombre'=>$this->nombre
            ,':apellido'=>$this->apellido
            ,':id_tipo_documento'=>$this->id_tipo_documento
            ,':id_tipo_genero'=>$this->id_tipo_genero
            ,':cuil'=>$this->cuil
            ,':fecha_nacimiento'=>$this->fecha_nacimiento
            ,':id_localidad'=>$this->id_localidad
            ,':numero_telefono'=>$this->numero_telefono
            ,':numero_documento'=>$this->numero_documento
            ,':email'=>$this->email
            ,':id_tipo_origen'=>$this->id_tipo_origen
            ,':id_actividad_economia_popular'=>$this->id_actividad_popular
            ,':monotributo'=>$this->monotributo
            ,':id_linea_programa'=>$this->id_linea_programa
            ,':codigo_postal)'=>$this->codigo_postal));
            $id= $stmtMiembro->lastInsertID();

            $sqlDomicilio='INSERT INTO miembros.domicilio(
                 id_miembros, municipio_alta, municipio_domicilio, id_localidad, calle, numero)
                VALUES ( :id_miembros, :municipio_alta, :municipio_domicilio, :id_localidad, :calle, :numero);';
            $stmtDomicilio= $this->conexion->prepare($sqlDomicilio);
            $stmtDomicilio->execute(array(':id_miembros'=>$id
                                            ,':municipio_alta'=>$this->municipio_alta
                                            ,':municipio_domicilio'=>$this->municipio_domicilio
                                            ,':id_localidad'=>$this->id_localidad
                                            ,':calle'=>$this->calle
                                            ,':numero'=>$this->numero));
            
            
            
            if(($stmtMiembro->rowCount() == 1)&&($stmtDomicilio->rowCount()==1)){
                echo json_encode('El miembro se agregó correctamente');
            }else{
                echo json_encode('Complete los campos obligatorios para contunuar');
                $this->conexion->rollBack();
            }
            
        }$this->conexion->commit();
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }
    public function modificar($accion){
        try {
            //code...
        $this->conexion->beginTransaction();
        if ($accion=='modificar') {
            # code...
            $sqlMiembro='UPDATE miembros.miembros (
                 nombre=:nombre
                , apellido=:apellido
                , id_tipo_documento::id_tipo_documento
                , id_tipo_genero=:id_tipo_genero
                , cuil=:cuil
                , fecha_nacimiento=:fecha_nacimiento
                , numero_documento=:numero_documento
                , numero_telefono=:numero_telefono
                , email=:email
                , id_tipo_origen=:id_tipo_origen
                , id_actividad_economia_popular=:id_actividad_economia_popular
                , monotributo=:monotributo
                , id_linea_programa=:id_linea_programa
                , codigo_postal=:codigo_postal
                , localidad=:localidad)
                
                WHERE id_miembro=:id_miembro;';
            $stmtMiembro= $this->conexion->prepare($sqlMiembro);
            $stmtMiembro->execute(array( ':nombre'=>$this->nombre
            ,':apellido'=>$this->apellido
            ,':id_tipo_documento'=>$this->id_tipo_documento
            ,':id_tipo_genero'=>$this->id_tipo_genero
            ,':cuil'=>$this->cuil
            ,':fecha_nacimiento'=>$this->fecha_nacimiento
            ,':numero_telefono'=>$this->numero_telefono
            ,':numero_documento'=>$this->numero_documento
            ,':email'=>$this->email
            ,':id_tipo_origen'=>$this->id_tipo_origen
            ,':id_actividad_economia_popular'=>$this->id_actividad_popular
            ,':monotributo'=>$this->monotributo
            ,':id_linea_programa'=>$this->id_linea_programa
            ,':codigo_postal)'=>$this->codigo_postal
            ,':id_miembro'=>$this->id_miembro
            ,':localidad'=>$this->id_localidad));

            $sqlDomicilio='UPDATE miembros.domicilio
            SET municipio_alta=:municipio_alta, municipio_domicilio=:municipio_domicilio, id_localidad=:id_lolcaidad, calle=:calle, numero=:numero
            WHERE id_miembro=:id_miembro;';
            $stmtDomicilio=$this->conexion->prepare($sqlDomicilio);
            $stmtDomicilio->execute(array(':municipio_alta'=>$this->municipio_alta
                                        ,':municipio_domicilio'=>$this->municipio_domicilio
                                        ,':id_localidad'=>$this->id_localidad
                                        ,':calle'=>$this->calle
                                        ,':numero'=>$this->numero));
            
            
            if(($stmtMiembro->rowCount() == 1)&&($stmtDomicilio->rowCount() == 1)){
                echo json_encode('El miembro se actualizó correctamente');
            }else{
                echo json_encode('Complete los campos obligatorios para contunuar');
                $this->conexion->rollBack();
            }
            
        }
        $this->conexion->commit();
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }  
    public function eliminar($accion){
        try {
            //code...
            $this->conexion->beginTransaction();
        if ($accion=='eliminar') {
            # code...
            $sql='DELETE from miembros.miembros where id_miembro=:id_miembro';
            $stmt=$this->conexion->prepare($sql);
            $stmt->execute(array(':id_miembro'=>$this->id_miembro));
            
            if($stmt->rowCount() == 1){
                echo json_encode('El miembro se eliminó correctamente');
            }else{
                echo json_encode('Complete los campos obligatorios para contunuar');
                $this->conexion->rollBack();
            }
            
        }        
        $this->conexion->commit();
        
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }

    }
};



$miembro= new miembro($conexion,$_POST);

$miembro->agregar($accion);
$miembro->modificar($accion);
$miembro->eliminar($accion);


// $sql='Select * From miembros.miembros';
// $stmt= $conexion->query($sql);
// $stmt->fetchAll(PDO::FETCH_OBJ);


// echo json_encode($stmt);






?>