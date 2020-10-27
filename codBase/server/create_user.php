<?php


require('lib.php');
$ContrasenaEncriptada = ' ';
//require('conector.php');
$id_usuarioDB = 0;  // almacena el número de usuario para registrar solo 3
$con = new ConectorDB();

{

if ($con->initConexion('agenda2')=='OK'){

$datos['Correo_Electronico'] = "usuarioA@hotmail.com";
$datos['Nombre_Completo'] = "Diego Galan";
$ContrasenaEncriptada = password_hash('Pescado', PASSWORD_DEFAULT);
$datos['Contrasena'] = $ContrasenaEncriptada;
if ($con->insertData('usuarios_agenda', $datos))
{
  echo "se insertaron los datos correctamente";
}
else {
  echo "se presentó un error en la inserción";
  }


$datos['Correo_Electronico'] = "usuarioB@hotmail.com";
$datos['Nombre_Completo'] = "Andres Avila";
$ContrasenaEncriptada = password_hash('Pelota', PASSWORD_DEFAULT);
$datos['Contrasena'] = $ContrasenaEncriptada;
if ($con->insertData('usuarios_agenda', $datos))
{
  echo "se insertaron los datos correctamente";
}
else {
  echo "se presentó un error en la inserción";
  }

$datos['Correo_Electronico'] = "usuarioC@hotmail.com";
$datos['Nombre_Completo'] = "Adriana_Molano";
$ContrasenaEncriptada = password_hash('Mariposa', PASSWORD_DEFAULT);
$datos['Contrasena'] = $ContrasenaEncriptada;
if ($con->insertData('usuarios_agenda', $datos))
{
  echo "se insertaron los datos correctamente";
}
else {
  echo "se presentó un error en la inserción";
  }

}

else {
  echo "se presento un error en la conexión";
}

$con->cerrarConexion();

}



/*

if ($con->initConexion('agenda2')=='OK') {

  $datos['nombre'] = "New York";

  if ($con->insertData('usuarios_agenda', $datos)) {
    echo "Se insertaron los datos correctamente";
  }else echo "Se ha producido un error en la inserción";

  $con->cerrarConexion();

}else {
  echo "Se presentó un error en la conexión";
}


*/

 ?>
