<?php
require '../../bd/conexion.php';

$sql='SELECT * from documentacion.documento join documentacion.tipo_documento using (id_tipo_documento) join miembros.localidad using (id_localidad) join miembros.departamento using (id_departamento) join miembros.provincia using (id_provincia) left join miembros.miembros using (id_miembros) left join miembros.usuarios using (id_usuarios)';
$stmt=$conexion->query($sql);
$documentos=$stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($documentos);
?>