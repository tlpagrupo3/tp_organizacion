<?php 
require '../bd/conexion.php';

class login {

    public $conexion;
    private $nombre_usuario;
    private $contrasena;
    
    public function __construct($conexion){
        $this->conexion=$conexion;
        $this->nombre_usuario=$_POST['nombre_usuario'];
        $this->contrasena=$_POST['contrasena'];
    }

    public function ingreso(){
        try {
            //code...
            $this->conexion->beginTransaction();
            $sql='SELECT nombre_usuario, contrasena
            FROM miembros.usuarios
            WHERE nombre_usuario=:nombre_usuario and contrasena=:contrasena;';
            $stmt=$this->conexion->prepare($sql);
            $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                ,':contrasena'=>$this->contrasena));

            $this->conexion->commit();
            if ($stmt->rowCount()==1) {
                # code...
                session_start();
                $this->conexion->beginTransaction();
                $sql='SELECT * from miembros.usuarios join miembros.miembros using(id_miembros) join miembros.nivel_acceso using(id_nivel_acceso)
                WHERE nombre_usuario=:nombre_usuario and contrasena=:contrasena;';
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute(array(':nombre_usuario'=>$this->nombre_usuario
                                    ,':contrasena'=>$this->contrasena));
                $usuarios= $stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($usuarios as $usuario) {
                    # code...
                
                $_SESSION['nombre']=$usuario->nombre;
                $_SESSION['apellido']=$usuario->apellido;
                $_SESSION['codigo_acceso']=$usuario->codigo_acceso;
                $_SESSION['id_tipo_genero']=$usuario->id_tipo_genero;
                echo json_encode('datos correctos');
                }
                $this->conexion->commit();
                
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo json_encode('El usuarios o la contraseña son incorrectos');
        }
    }
}

$login= new login($conexion);
$login->ingreso();

?>