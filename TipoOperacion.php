<?php

class TipoOperacion {

/* variables de la clase TipoOperacion */

  var $sdescripcion;

  var $bactivo;

/* M�todo Constructor: Cada vez que creemos una variable

de esta clase, se ejecutar� esta funci�n */

function TipoOperacion($sdescripcion = "", $bactivo = "" ) {
  $this->sdescripcion = $sdescripcion;
  $this->bactivo      = $bactivo;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = ""){

  $SQL =  "SELECT id, sdescripcion FROM tipo_operacion WHERE ";

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

/* Si hemos tenido �xito en la consulta devuelve el identificador de la conexi�n, sino devuelve 0 */

  return $resultado;

}

/* Ejecuta un Insercion */

function create($Conexion_ID, $datos = ""){

  $query = "INSERT INTO tipo_operacion (sdescripcion) VALUES ('".$datos['sdescripcion'].")";

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualizaci�n */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

  $query = "UPDATE tipo_operacion set sdescripcion = '". $datos["sdescripcion"] ." WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualizaci�n del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE tipo_operacion set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualizaci�n */

function listarTipoOperacion($Conexion_ID){

  $query = "SELECT id,sdescripcion FROM tipo_operacion  WHERE bactivo = 1 ORDER BY sdescripcion";

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
