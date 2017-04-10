<?php

class Responsable {

/* variables de la clase Responsable */

  var $sdescripcion;

  var $bactivo;

/* Método Constructor: Cada vez que creemos una variable

de esta clase, se ejecutará esta función */

function Responsable($sdescripcion = "", $bactivo = "" ) {
  $this->sdescripcion = $sdescripcion;
  $this->bactivo      = $bactivo;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = ""){

  $SQL =  "SELECT id, sdescripcion FROM responsable WHERE ";

  if (!empty($Where)) {

    $SQL .= $Where;
  }

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($SQL);

  if (!$stmt->execute()) {
    $this->Errno = mysql_errno();
    $this->Error = mysql_error();
  }
  $resultado = $stmt->get_result();

/* Si hemos tenido éxito en la consulta devuelve el identificador de la conexión, sino devuelve 0 */

  return $resultado;

}

/* Ejecuta un Insercion */

function create($Conexion_ID, $datos = ""){

  $query = "INSERT INTO responsable (sdescripcion) VALUES ('".$datos['sdescripcion']."')";

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

  $query = "UPDATE responsable set sdescripcion = '". $datos["sdescripcion"] ."' WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE responsable set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización */

function listarResponsable($Conexion_ID){

  $query = "SELECT id,sdescripcion FROM responsable  WHERE bactivo = 1 ORDER BY sdescripcion ";

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($query);

  if (!$stmt->execute()) {
    $this->Errno = mysql_errno();
    $this->Error = mysql_error();
  }
  $resultado = $stmt->get_result();

  $Datos[0] = "Seleccione -----";
  while ($row = $resultado->fetch_assoc()) {

    $Datos[$row['id']] = $row['sdescripcion'];

  }

  return $Datos;
}

}
?>
