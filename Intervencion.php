<?php

class Intervencion {


/* variables de la clase Intervencion */

  var $sdescripcion;

  var $bactivo;

/* Método Constructor: Cada vez que creemos una variable

de esta clase, se ejecutará esta función */

function Intervencion($sdescripcion = "", $nmonto_ref = "", $bactivo = "" ) {
  $this->sdescripcion = $sdescripcion;
  $this->nmonto_ref   = $nmonto_ref;
  $this->bactivo      = $bactivo;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = ""){

  $SQL =  "SELECT * FROM intervencion";

  if (!empty($Where)) {

    $SQL .= " WHERE " . $Where;
  }

  $SQL .= " ORDER BY sdescripcion ";

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

  $Monto = ($_POST["nmonto_ref"]) ? $_POST["nmonto_ref"] : 0;
  $query = "INSERT INTO intervencion (sdescripcion, nmonto_ref) VALUES ('".$datos['sdescripcion']."','". $Monto ."')";

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

  $Monto = ($_POST["nmonto_ref"]) ? $_POST["nmonto_ref"] : 0;
  $query = "UPDATE intervencion set sdescripcion = '". $datos["sdescripcion"] . "', nmonto_ ref = '". $Monto ."' WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE intervencion set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

function listarIntervencion($Conexion_ID){

  $query = "SELECT id,sdescripcion FROM intervencion  WHERE bactivo = 1 ";

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
