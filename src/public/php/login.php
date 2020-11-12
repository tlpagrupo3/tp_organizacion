<?php 
require '../bd/conexion.php';

class login {

    public $conexion;
    private $nombre_usuario;
    private $contrasena;
    
    public function __construct($conexion,$_POST){
        $this->conexion=$conexion;
        $this->nombre_usuario=$_POST['nombre_usuario'];
        $this->contrasena=$_POST['contrasena'];
    }

    public function ingreso(){
        try {
            //code...
            $sql='SELECT nombre_usuario, contrasena
            FROM miembros.usuarios
            WHERE nombre_usuario=:nombre_usuario and contrasena=:contrasena;';
            $stmt=$this->conexion->prepare($sql);
            $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                ,':contrasena'=>$this->contrasena));
            if ($stmt->rowCount()==1) {
                # code...
                session_start();
                $sql='SELECT * from miembros.usuarios join miembros.miembros using(id_miembros) join miembros.nivel_acceso using(id_nivel_acceso)
                WHERE nombre_usuario=:nombre_usuario and contrasena=:contrasena;';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                    ,':contrasena'=>$this->contrasena));
                $usuarios= $stmt->fetchAll(PDO::FETCH_OBJ);
                $_SESSION['nombre']=$usuarios->nombre;
                $_SESSION['apellido']=$usuarios->apellido;
                $_SESSION['codigo_acceso']=$usuarios->codigo_acceso;
                $_SESSION['id_tipo_genero']=$usuarios->id_tipo_genero;
                header('location: ../modulos/landing/');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo json_encode('El usuarios o la contraseña son incorrectos');
        }
    }
}

$login= new login($conexion,$_POST);
$login->ingreso();

?>