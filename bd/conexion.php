<?php
   
define('DB_HOST','localhost');
    define('DB_USER','postgres');
    define('DB_PASS','3737Arveja');
    define('DB_NAME','sadop');
    define('DB_PORT',5432);




    try{
        $conexion = new PDO('pgsql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME
                            , DB_USER
                            , DB_PASS
                            );
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
    } catch (PDOException $e){
        die ('Falló la conexion: '. $e->getMessage());
    }
    

?>