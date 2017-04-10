<?php

class Doctor {


/* variables de la clase Doctor */

  var $snombre;

  var $sapellido;

  var $stelefono;

  var $stelefono_1;

  var $id_especialidad;

  var $bactivo;

/* Método Constructor: Cada vez que creemos una variable

de esta clase, se ejecutará esta función */

function Doctor($snombre = "", $sapellido = "", $stelefono = "", $stelefono_1 = "", $id_especialidad = "", $bactivo = "" ) {
  $this->snombre         = $snombre;
  $this->sapellido       = $sapellido;
  $this->stelefono       = $stelefono;
  $this->stelefono_1     = $stelefono_1;
  $this->id_especialidad = $id_especialidad;
  $this->bactivo         = $bactivo;
}
/* Ejecuta un consulta */

function consulta($Conexion_ID, $Where = ""){

  $SQL =  "SELECT me.id, me.snombre,
		              me.sapellido, me.stelefono,
		              me.stelefono_1, me.id_especialidad,
		              me.bactivo, esp.id as esp_id, esp.sdescripcion as esp_descrip 
             FROM doctor me, especialidad esp 
            WHERE me.id_especialidad = esp.id ";

  if (!empty($Where)) {
    $SQL .= " AND " . $Where;

  }

  $SQL .= " ORDER BY sapellido ";

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

  $query = "INSERT INTO doctor (snombre,sapellido,stelefono,stelefono_1,id_especialidad) 
	               VALUES ('".$datos['snombre']."','".$datos['sapellido']."','".$datos['stelefono']."','".
                            $datos['stelefono_1']."','".$datos['id_especialidad']."')";

  $stmt = $Conexion_ID->prepare($query);
  $reponse = $stmt->execute();

  return $response;
}

/* Ejecuta un Actualización */

function actualiza($Conexion_ID, $Where = "", $datos = ""){

	$query = "UPDATE doctor set snombre = '". $datos["snombre"] .
		                      "', sapellido = '". $datos['sapellido']. 
	                        "', stelefono = '". $datos['stelefono'].
	                        "', stelefono_1 = '". $datos['stelefono_1'].
		                      "', id_especialidad = '". $datos['id_especialidad']."' WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);
  $response = $stmt->execute();

  return $response;
}

/* Ejecuta un Actualización del campo bactivo */

function elimina($Conexion_ID, $Where = ""){

  $query = "UPDATE doctor set bactivo = 0  WHERE ";

  if (!empty($Where)){
    $query .= $Where;
  }

  $stmt = $Conexion_ID->prepare($query);
  $response = $stmt->execute();

  return $response;
}


function listarDoctores($Conexion_ID, $Where){

  $query = "SELECT id,snombre,sapellido FROM doctor  WHERE ";

  if ($Where){
    $query .= $Where. " AND ";
  }
	
  $query .= " bactivo = 1 order by sapellido, snombre ";

//ejecutamos la consulta

  $stmt = $Conexion_ID->prepare($query);

  if (!$stmt->execute()) {

    $this->Errno = mysql_errno();

    $this->Error = mysql_error();

  }

  $resultado = $stmt->get_result();

  $Datos[0] = "Seleccione -----";
  while ($row = $resultado->fetch_assoc()) {

    $Datos[$row['id']] = $row['sapellido'].", ".$row['snombre'];

  }

  return $Datos;
}


/* Devuelve el número de campos de una consulta */

function numcampos() {

  return mysql_num_fields($this->Consulta_ID);

}

/* Devuelve el número de registros de una consulta */

function numregistros(){

  return mysql_num_rows($this->Consulta_ID);

}

/* Devuelve el nombre de un campo de una consulta */

function nombrecampo($numcampo) {

  return mysql_field_name($this->Consulta_ID, $numcampo);

}

}
?>
