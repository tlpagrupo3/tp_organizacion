<?php
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido']) || !isset($_SESSION['codigo_acceso']) || !isset($_SESSION['id_tipo_genero'])) {
    header('Location: /sadop/src/public/modulos/login/');
}


?>

