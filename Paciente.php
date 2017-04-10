<?php

class Paciente {


/* variables de la clase Paciente */

  var $shistoria;

  var $snombre;

  var $sapellido;

/* Método Constructor: Cada vez que creemos una variable

de esta clase, se ejecutará esta función */

function Paciente($shistoria = "", $snombre = "", $sapellido = "", $edad = '' ) {
  $this->shistoria = $shistoria;
  $this->snombre   = $snombre;
  $this->sapellido = $sapellido;
  $this->edad      = $edad;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = "", $Order = ""){

  $SQL =  "SELECT * FROM paciente";

  if (!empty($Where)) {

    $SQL .= " WHERE " . $Where;
  }

  if (!empty($Order)) {

    $SQL .= " ORDER BY " . $Order;
  }

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($SQL);

  if (!$stmt->execute()) {

    $this->Errno = mysql_errno();

    $this->error = mysql_error();
    print $this->error;

  }

  $resultado = $stmt->get_result();

/* Si hemos tenido éxito en la consulta devuelve el identificador de la conexión, sino devuelve 0 */

  return $resultado;

}

/* Ejecuta un Insercion */

function create($Conexion_ID, $datos = ""){

  $query = "INSERT INTO paciente (shistoria,snombre,sapellido,edad) 
            VALUES ('".$datos['shistoria']."','".
                       strtoupper(utf8_decode($datos['snombre']))."','".
                       strtoupper(utf8_decode($datos['sapellido']))."','".
                       $datos['edad']."')";

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

  $query = "UPDATE paciente set shistoria = '". $datos["shistoria"].
           "', snombre = '". strtoupper(utf8_decode($datos["snombre"])).
           "', sapellido = '". strtoupper(utf8_decode($datos['sapellido'])). 
           "', edad = '".$datos['edad']."' WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE paciente set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

function listarPaciente($Conexion_ID){

  $query = "SELECT id,shistoria,sapellido,snombre, edad FROM paciente  WHERE bactivo = 1  ORDER BY sapellido, snombre";

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($query);

  if (!$stmt->execute()) {
    $this->Errno = mysql_errno();
    $this->error = mysql_error();
  }

  $resultado = $stmt->get_result();

  $Datos[0] = "Seleccione -----";
  while ($row = $resultado->fetch_assoc()) {

    $Datos[$row['id']] = $row['shistoria']." -- ".utf8_encode(strtoupper($row['sapellido'])).", ".strtoupper($row['snombre']);

  }

  return $Datos;
}

}
?>
