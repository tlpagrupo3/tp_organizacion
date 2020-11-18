<?php
header('Access-Control-Allow-Origin: *');
require 'http://localhost/sadop/src/public/php/consultas/consulta_session.php';

echo json_encode($_SESSION);
?>