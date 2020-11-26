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


    function __construct($conexion)
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
        $this->numero_telefono=$_POST['numero_telefono'];
        $this->email=$_POST['email'];
        $this->id_tipo_origen=$_POST['id_tipo_origen'];        
        $this->id_actividad_popular=$_POST['id_actividad_economia_popular'];
        $this->monotributo=$_POST['monotributo'];
        $this->id_linea_programa=$_POST['id_linea_programa'];
        $this->codigo_postal=$_POST['codigo_postal'];
        $this->calle=$_POST['calle'];
        $this->numero=$_POST['numero'];
        $this->municipio_alta=$_POST['municipio_alta'];
        $this->municipio_domicilio=$_POST['municipio_domicilio'];
    }

    public function agregar($accion){
        try {
            //code...
        
            if ($accion=='agregar') {
                # code...

                function validar_nombre($nombre){
                    if (is_numeric($nombre) ==1) return false;
                    if (strlen($nombre)<3) return false;
                    return true;
                  };
                  function validar_apellido($apellido){
                    if (is_numeric($apellido) ==1) return false;
                    if (strlen($apellido)<3) return false;
                    return true;
                  };
                  function validar_dni($dni){
                    $numdni = str_replace('.','',trim($dni,'.'));
                    if (is_numeric($numdni) <>1) return false;
                    if (strlen($numdni)!==8) return false;
                    return true;
                  };
                
                  function validar_cuil($CUIL){
                    $numcuil = str_replace('-','',trim($CUIL,'-'));
                
                    if (is_numeric($numcuil) <>1) return false;
                    if (strlen($numcuil)!==11) return false;
                    
                    $factores = array(5,4,3,2,7,6,5,4,3,2);
                    $sumatoria =0;
                    
                    for($i=0;$i<strlen($numcuil)-1;$i++){
                      
                      $orden = substr($numcuil,$i,1);
                      $sumatoria += ($orden* $factores[$i]);
                      
                    };
                
                    $resto = $sumatoria % 11;
                    $digitoVerificador = ($resto != 0 ) ? 11-$resto : $resto;
                
                    return ($digitoVerificador == substr($numcuil, strlen($numcuil)-1));
                  };
                
                
                  function validar_direccion($direccion){
                    if (is_numeric($direccion) ==1) return false;
                    if (strlen($direccion)<7) return false;
                    return true;
                  }

                  if (!validar_nombre($this->nombre)){
                    echo $this->nombre. ' Debe ingresar un Nombre';
                    exit;
                  }
                  if (!validar_apellido($this->apellido)){
                    echo $this->apellido. ' Debe ingresar un Apellido';
                    exit;
                  }
                  if (!validar_dni($this->numero_documento)){
                    echo $this->dni. ' DNI Incorrecto';
                    exit;
                  }
                  if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) === true) {
                  echo("$this->email ingrese un correo valido");
                  exit;
                  }
                  if (!validar_cuil($this->cuil)){
                    echo $this->cuil.' Cuil incorrecto';
                    exit;
                    
                  }

                  if (!validar_direccion($this->calle)){
                    echo $this->calle.' Ingrese una dirección';
                    exit;
                  }


                $this->conexion->beginTransaction();
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
                    , codigo_postal)
                    VALUES ( :nombre
                            ,:apellido
                            ,:id_tipo_documento
                            ,:id_tipo_genero
                            ,:cuil
                            ,:fecha_nacimiento
                            ,:numero_documento
                            ,:numero_telefono
                            ,:email
                            ,:id_tipo_origen
                            ,:id_actividad_economia_popular
                            ,:monotributo
                            ,:id_linea_programa
                            ,:codigo_postal);';
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
                ,':codigo_postal'=>$this->codigo_postal));
            

                $sqlDomicilio='INSERT INTO miembros.domicilio(
                    id_miembros, municipio_alta, municipio_domicilio, id_localidad, calle, numero)
                    VALUES ( (SELECT max(id_miembros) from miembros.miembros), :municipio_alta, :municipio_domicilio, :id_localidad, :calle, :numero);';
                $stmtDomicilio= $this->conexion->prepare($sqlDomicilio);
                $stmtDomicilio->execute(array(':municipio_alta'=>$this->municipio_alta
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
                $this->conexion->commit();
            }
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }
    public function modificar($accion){
        try {
            //code...
        
        if ($accion=='modificar') {
            # code...

            function validar_nombre($nombre){
                if (is_numeric($nombre) ==1) return false;
                if (strlen($nombre)<3) return false;
                return true;
              };
              function validar_apellido($apellido){
                if (is_numeric($apellido) ==1) return false;
                if (strlen($apellido)<3) return false;
                return true;
              };
              function validar_dni($dni){
                $numdni = str_replace('.','',trim($dni,'.'));
                if (is_numeric($numdni) <>1) return false;
                if (strlen($numdni)!==8) return false;
                return true;
              };
            
              function validar_cuil($CUIL){
                $numcuil = str_replace('-','',trim($CUIL,'-'));
            
                if (is_numeric($numcuil) <>1) return false;
                if (strlen($numcuil)!==11) return false;
                
                $factores = array(5,4,3,2,7,6,5,4,3,2);
                $sumatoria =0;
                
                for($i=0;$i<strlen($numcuil)-1;$i++){
                  
                  $orden = substr($numcuil,$i,1);
                  $sumatoria += ($orden* $factores[$i]);
                  
                };
            
                $resto = $sumatoria % 11;
                $digitoVerificador = ($resto != 0 ) ? 11-$resto : $resto;
            
                return ($digitoVerificador == substr($numcuil, strlen($numcuil)-1));
              };
            
            
              function validar_direccion($direccion){
                if (is_numeric($direccion) ==1) return false;
                if (strlen($direccion)<7) return false;
                return true;
              }

              if (!validar_nombre($this->nombre)){
                echo $this->nombre. ' Debe ingresar un Nombre';
                exit;
              }
              if (!validar_apellido($this->apellido)){
                echo $this->apellido. ' Debe ingresar un Apellido';
                exit;
              }
              if (!validar_dni($this->numero_documento)){
                echo $this->dni. ' DNI Incorrecto';
                exit;
              }
              if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) === true) {
              echo("$this->email ingrese un correo valido");
              exit;
              }
              if (!validar_cuil($this->cuil)){
                echo $this->cuil.' Cuil incorrecto';
                exit;
                
              }

              if (!validar_direccion($this->calle)){
                echo $this->calle.' Ingrese una dirección';
                exit;
              }


            $this->conexion->beginTransaction();
            $sqlMiembro='UPDATE miembros.miembros SET
                 nombre=:nombre
                , apellido=:apellido
                , id_tipo_documento=:id_tipo_documento
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
                
                WHERE id_miembros=:id_miembro;';
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
            ,':codigo_postal'=>$this->codigo_postal
            ,':id_miembro'=>$this->id_miembro));

            $sqlDomicilio='UPDATE miembros.domicilio
            SET municipio_alta=:municipio_alta, municipio_domicilio=:municipio_domicilio, id_localidad=:id_localidad, calle=:calle, numero=:numero
            WHERE id_miembros=:id_miembro;';
            $stmtDomicilio=$this->conexion->prepare($sqlDomicilio);
            $stmtDomicilio->execute(array(':municipio_alta'=>$this->municipio_alta
                                        ,':municipio_domicilio'=>$this->municipio_domicilio
                                        ,':id_localidad'=>$this->id_localidad
                                        ,':calle'=>$this->calle
                                        ,':numero'=>$this->numero
                                        ,':id_miembro'=>$this->id_miembro));
            
            
            if(($stmtMiembro->rowCount() == 1)&&($stmtDomicilio->rowCount() == 1)){
                echo json_encode('El miembro se actualizó correctamente');
            }else{
                echo json_encode('Complete los campos obligatorios para contunuar');
                $this->conexion->rollBack();
            }
            $this->conexion->commit();
        }
        
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }
    }  
    public function eliminar($accion){
        try {
            //code...
            
            if ($accion=='eliminar') {
                # code...
                $this->conexion->beginTransaction();

                $sqlDomicilio='DELETE FROM miembros.domicilio WHERE id_miembros=:id_miembro;';
                $stmtDomicilio=$this->conexion->prepare($sqlDomicilio);
                $stmtDomicilio->execute(array(':id_miembro'=>$this->id_miembro));

                $sqlMiembro='DELETE from miembros.miembros where id_miembros=:id_miembro';
                $stmtMiembro=$this->conexion->prepare($sqlMiembro);
                $stmtMiembro->execute(array(':id_miembro'=>$this->id_miembro));

                
                if($stmtMiembro->rowCount() == 1 && $stmtDomicilio->rowCount() == 1 ){
                    echo json_encode('El miembro se eliminó correctamente');
                }else{
                    echo json_encode('Complete los campos obligatorios para contunuar');
                    $this->conexion->rollBack();
                }
                $this->conexion->commit();
            }        
        
        
        }catch (PDOException $e) {
            //throw $th;
            echo json_encode('Ha ocurrido un error, intente mas tarde: '.$e);
        }

    }
};



$miembro= new miembro($conexion);

$miembro->agregar($accion);
$miembro->modificar($accion);
$miembro->eliminar($accion);


// $sql='Select * From miembros.miembros';
// $stmt= $conexion->query($sql);
// $stmt->fetchAll(PDO::FETCH_OBJ);


// echo json_encode($stmt);






?>