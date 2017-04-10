<?php

class Usuario {


/* variables de la clase Usuario */

  var $snombre;

  var $sapellido;

  var $susuario;

  var $scontrasena;

  var $scorreo;

  var $badministrador;

/* Método Constructor: Cada vez que creemos una variable

de esta clase, se ejecutará esta función */

function Usuario($snombre = "", $sapellido = "", $susuario = "", $scontrasena = "", $scorreo = "", $badministrador = "" ) {
  $this->snombre        = $snombre;
  $this->sapellido      = $sapellido;
  $this->susuario       = $susuario;
  $this->scontrasena    = $scontrasena;
  $this->scorreo        = $scorreo;
  $this->badministrador = $badministrador;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = ""){

  $SQL =  "SELECT * FROM usuario";

  if (!empty($Where)) {

    $SQL .= " WHERE " . $Where;
  }

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($SQL);

  if (!$stmt->execute()) {
    $this->Errno = mysql_errno();
    $this->Error = mysql_error();
  }

/* Si hemos tenido éxito en la consulta devuelve el identificador de la conexión, sino devuelve 0 */

  return $stmt->get_result();

}

/* Ejecuta un Insercion */

function create($Conexion_ID, $datos = ""){

  $query = "INSERT INTO usuario (snombre,sapellido,susuario,scontrasena,scorreo,badministrador, id_doctor) 
	               VALUES ('".$datos['snombre']."','".$datos['sapellido']."','".$datos['susuario']."','".sha1($datos['scontrasena'])."','".
	                       $datos['scorreo']."','".$datos['badministrador'][0]."','".$datos['id_doctor']."')";

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

/* Ejecuta un Actualización */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

  $query = "UPDATE usuario set snombre = '". $datos["snombre"] .
		           "', sapellido = '". $datos['sapellido']. 
	             "', susuario = '". $datos['susuario'].
		           "', scontrasena = '". sha1($datos['scontrasena']).
		           "', scorreo = '". $datos['scorreo'].
	             "', badministrador = '". $datos['badministrador'][0]."' WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmet->execute();
}

/* Ejecuta un Actualización del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE usuario set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);

  return $stmt->execute();
}

}
?>
