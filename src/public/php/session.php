<?php
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido']) || !isset($_SESSION['codigo_acceso']) || !isset($_SESSION['id_tipo_genero'])) {
    header('Location: /src/public/modulos/login/');
}

if(!isset($_COOKIE['nombre'])||!isset($_COOKIE['nombre'])||!isset($_COOKIE['ca'])||!isset($_COOKIE['sexo'])) {
    setcookie('nombre',$_SESSION['nombre']);
    setcookie('apellido',$_SESSION['apellido']);
    setcookie('ca',$_SESSION['codigo_acceso']);
    setcookie('sexo',$_SESSION['id_tipo_genero']);
  } 

?>

