<?php
require ('./conector.php');
$con = new ConectorDB();
$response ['conexion'] = $con->initConexion('agenda2');
echo json_encode($response);
//$con->cerrarConexion();



 ?>
