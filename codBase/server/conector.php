<?php

class ConectorDB
{
  private $host = 'localhost';
  private $user = 'Admin_Agenda2';
  private $password = '123456';
  private $conexion;


  function initConexion($nombre_db){
    $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
    if ($this->conexion->connect_error) {
      return "Error_  : ".$this->conexion->connect_error;
    echo "error";
    }
    else{
      return "OK";
      echo "ok";
    }
    $this->close();
  }


  //return $this->ejecutarQuery($sql);
}
 ?>
