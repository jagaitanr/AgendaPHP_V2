<?php
//require ('./conector.php');
require ('./lib.php');
$con = new ConectorDB();
$response ['conexion'] = $con->initConexion('agenda2');

//$respuestaString ->  json_decode ($response);
$var1 = $response ['conexion'];
echo $var1;

$var2 = password_hash('Pescado', PASSWORD_DEFAULT);
echo $var2;

if ($var1 =="OK")
{
  echo ("la conexion ha sido exitosa, estoy en cheeck login");
  $resultado_consulta = $con->consultarRegistro(['usuarios_agenda'], ['Correo_Electronico','Contrasena'], 'WHERE Correo_Electronico ="'."usuarioA@hotmail.com".'"AND Contrasena="$2y$10$woafblt.7Jjh94qP6PL2Ye4w/L1dwmWR/FFGBEYJOmEsGWaXFVVgq"');
  if ($resultado_consulta->num_rows!=0)
  {
    $response['acceso']='concedido';
  }
  else
  {
    $response['acceso']= 'denegado';
  }
}
else {
  echo ("falla en la conexión revise el servidore jajajaj");
}

echo json_encode($response);
//$con->cerrarConexion();



 ?>
