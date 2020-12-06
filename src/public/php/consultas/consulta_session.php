<?php
header('Access-Control-Allow-Origin: *');
session_id($_POST['session']);
session_start();
echo json_encode($_SESSION);


// $consulta= $_POST[''];
// if (isset($_SESSION['id_tipo_genero'])) {
//     # code...
//     echo json_encode($_SESSION);
    
// }else {
//     # code...
//     echo json_encode('no existe la session');
// }

?>
