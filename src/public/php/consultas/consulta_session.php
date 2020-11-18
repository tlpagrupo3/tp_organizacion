<?php
header('Access-Control-Allow-Origin: *');
session_start();
if (isset($_SESSION['id_tipo_genero'])) {
    # code...
    echo json_encode($_SESSION);
}else {
    # code...
    echo json_encode('no existe la session');
}
var_dump($_SERVER['REMOTE_ADDR']);



?>

