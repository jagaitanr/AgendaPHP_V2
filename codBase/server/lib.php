<?php


  class ConectorDB
  {
   /*  private $host = 'localhost';
    private $user = 'nextu';
    private $password = '12345';
    private $conexion;

    function initConexion($nombre_db){
      $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }
*/

private $host = 'localhost';
private $user = 'Admin_Agenda2';
private $password = '123456';
private $conexion;


function initConexion($nombre_db){
  $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
  if ($this->conexion->connect_error) {
    return "Error: ".$this->conexion->connect_error;
  echo "error";
  }
  else{
    return "OK";
    echo "ok";
  }
  $this->close();
}

    function newTable($nombre_tbl, $campos){
      $sql = 'CREATE TABLE '.$nombre_tbl.' (';
      $length_array = count($campos);
      $i = 1;
      foreach ($campos as $key => $value) {
        $sql .= $key.' '.$value;
        if ($i!= $length_array) {
          $sql .= ', ';
        }else {
          $sql .= ');';
        }
        $i++;
      }
      return $this->ejecutarQuery($sql);
    }

    function ejecutarQuery($query){
      return $this->conexion->query($query);
    }

    function cerrarConexion(){
      $this->conexion->close();
    }

    function nuevaRestriccion($tabla, $restriccion){
      $sql = 'ALTER TABLE '.$tabla.' '.$restriccion;
      return $this->ejecutarQuery($sql);
    }

    function nuevaRelacion($from_tbl, $to_tbl, $from_field, $to_field){
      $sql = 'ALTER TABLE '.$from_tbl.' ADD FOREIGN KEY ('.$from_field.') REFERENCES '.$to_tbl.'('.$to_field.');';
      return $this->ejecutarQuery($sql);
    }

    function insertData($tabla, $data){
      $sql = 'INSERT INTO '.$tabla.' (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= $key;
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ')';
        $i++;
      }
      $sql .= ' VALUES (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= "'".$value."'";
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ');';
        $i++;
      }

      //echo $sql;
      return $this->ejecutarQuery($sql);

    }

    function consultarRegistro($tabla, $campos, $condicion = ""){
      $sql = "SELECT";
      $ultima_key =end(array_keys($campos));
      foreach($campos as $key =>$value){
        $sql .=$value;
        if ($key!=$ultima_key){
          $sql.=",";
          }
          else $sql .= " FROM ";
      }

      $ultima_key = end(array_keys($tablas));
      foreach ($tablas as $key =>$value){
        $sql .=$value;
        if ($key!=$ultima_key){
          $sql.=", ";
        }else $sql .= " ";
        }

        if ($condicion == ""){
          $sql .= $condicion.";";
        }else{
          $sql .=$condicion.";";
        }
        return $this->ejecutarQuery($sql);
    }


  }





 ?>
