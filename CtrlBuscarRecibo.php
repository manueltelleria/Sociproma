<?php

  session_start();

  require ("MysqlDB.php");
  require ("Doctor.php");
  require ("Paciente.php");
  require ("TipoOperacion.php");
  require ("Responsable.php");
  require ("Intervencion.php");
  require ("PacienteIntervencion.php");
  require ("DetallePacienteInterven.php");
  require ("Fecha.php");
  require ("Estatus.php");
  require("SmartyIni.php");

  $smarty  = new SmartyIni;

  $smarty->assign('usuario_log', $_SESSION['usuario_log']);
  $smarty->assign('nombre_log', $_SESSION['nombre_log'].", ".$_SESSION['apellido_log']);
  $smarty->assign('badministra', $_SESSION['badministra']);
  $smarty->assign('subtitulo', '');
  $smarty->assign('ArrRecibos', '');
  $smarty->assign('error_msg', '');
  $smarty->assign('monto_total', '');

  $smarty->assign('titulo','Consulta de Recibos');

  if(!$_SESSION['usuario_log']){
    header('location: http://localhost:8080/iniciosesion.php');
  }

  $ConsultaId;


  $miconexion = new DB_mysql ;

  $miDoctor   = new Doctor;

  $miPaciente = new Paciente;

  $miTipoOperacion = new TipoOperacion;

  $miResponsable = new Responsable;

  $miIntervencion = new Intervencion;

  $miPacienteIntervencion = new PacienteIntervencion;

  $miDetallePacienteInterven = new DetallePacienteInterven;

  $miEstatus = new Estatus;

  $miconexion->conectar("", "", "", "");

  $Paciente = $miPaciente->listarPaciente( $miconexion->Conexion_ID );
  $smarty->assign('pacien_options', $Paciente);

  $TipoOperacion = $miTipoOperacion->listarTipoOperacion( $miconexion->Conexion_ID );
  $smarty->assign('tpopera_options', $TipoOperacion);

  $DoctorCiru = $miDoctor->listarDoctores( $miconexion->Conexion_ID, " id_especialidad = 1 " );
  $smarty->assign('doctorCiru_options', $DoctorCiru);

  $DoctorAnes = $miDoctor->listarDoctores( $miconexion->Conexion_ID, " id_especialidad = 2 " );
  $smarty->assign('doctorAnes_options', $DoctorAnes);

  $Responsable = $miResponsable->listarResponsable( $miconexion->Conexion_ID );
  $smarty->assign('respon_options', $Responsable);

  $Estatus = $miEstatus->listarEstatus( $miconexion->Conexion_ID );
  $smarty->assign('estatus_options', $Estatus);

  if (!empty($_POST['accion']) && $_POST['accion'] != "buscarPacientes" ) {
    if ($_POST["accion"] == "buscar"){
      buscar( $smarty, $miconexion->Conexion_ID, $miPacienteIntervencion );

      $smarty->assign('numreciboini',        $_POST["numreciboini"] );
      $smarty->assign('numrecibofin',        $_POST["numrecibofin"] );
      $smarty->assign('id_paciente',         $_POST["id_paciente"] );
      $smarty->assign('fechainicial',        $_POST["fechainicial"] );
      $smarty->assign('fechafinal',          $_POST["fechafinal"] );
      $smarty->assign('id_tpoperacion',      $_POST["id_tpoperacion"] );
      $smarty->assign('id_doctor_cirujano',  $_POST["id_doctor_cirujano"] );
      $smarty->assign('id_doctor_anestesia', $_POST["id_doctor_anestesia"] );
      $smarty->assign('id_responsable',      $_POST["id_responsable"] );
      $smarty->assign('id_estatus',          $_POST["id_estatus"] );
    }
  }
  else{

    if (!empty($_POST["accion"]) && ($_POST["accion"] == "buscarPacientes")  && !empty($_POST["criterio"]) ){
      if ($_POST["accion"] == "buscarPacientes"){
        buscarPacientes( $miconexion->Conexion_ID, $miPaciente );
      }
      elseif ($_POST["accion"] == "buscarIntervenciones"){
        buscarIntervenciones( $miconexion->Conexion_ID, $miIntervencion );
      }
      exit;
    }

	if (!empty($_SESSION['numreciboini'])){
	  $smarty->assign('numreciboini', $_SESSION['numreciboini']);	
	}  else {
	  $smarty->assign('numreciboini', '');	
	}

	if (!empty($_SESSION['numrecibofin'])){
	  $smarty->assign('numrecibofin', $_SESSION['numrecibofin']);
	} else {
	  $smarty->assign('numrecibofin', '');
	}

	if (!empty($_SESSION['id_paciente'])){
	  $smarty->assign('id_paciente', $_SESSION['id_paciente']);
	} else {
	  $smarty->assign('id_paciente', '');
	}

	if (!empty($_SESSION['id_fechainicial'])){
	  $smarty->assign('fechainicial', $_SESSION['id_fechainicial']);	
	} else {
	  $smarty->assign('fechainicial', '');	
	}

	if (!empty($_SESSION['id_fechafinal'])){
	  $smarty->assign('fechafinal', $_SESSION['id_fechafinal']);
	} else {
	  $smarty->assign('fechafinal', '');	
	}

	if (!empty($_SESSION['id_tpoperacion'])){
	  $smarty->assign('id_tpoperacion', $_SESSION['id_tpoperacion']);
	} else {
	  $smarty->assign('id_tpoperacion', '');	
	}

	if (!empty($_SESSION['id_doctor_cirujano'])){
	  $smarty->assign('id_doctor_cirujano', $_SESSION['id_doctor_cirujano']);
	} else {
	  $smarty->assign('id_doctor_cirujano', '');	
	}

	if (!empty($_SESSION['id_doctor_anestesia'])){
	  $smarty->assign('id_doctor_anestesia', $_SESSION['id_doctor_anestesia']);
	} else {
	  $smarty->assign('id_doctor_anestesia', '');	
	}

	if (!empty($_SESSION['id_responsable'])){
	  $smarty->assign('id_responsable', $_SESSION['id_responsable']);
	} else {
	  $smarty->assign('id_responsable', '');	
	}

	if (!empty($_SESSION['id_estatus'])){
	  $smarty->assign('id_estatus', $_SESSION['id_estatus']);
	} else {
	  $smarty->assign('id_estatus', '');	
	}

    if (empty($_POST["accion"]) && !empty($_SESSION['condicion'])){
      buscar( $smarty, $miconexion->Conexion_ID, $miPacienteIntervencion );
    } 
  }
      
  $smarty->display('BuscarRecibos.tpl');

function buscar( $smarty, $Conexion_ID, $PacienteIntervencion ) {

  $miFecha = new Fecha;

  $Where =  array();

  #print join(" AND ", $Where);

  if (empty($_SESSION['condicion'])){
    if ($_POST["numreciboini"]){
      $Where[] = " num_recibo >= ". $_POST["numreciboini"];
      $_SESSION['numreciboini'] = $_POST["numreciboini"];
    }
    if ($_POST["numrecibofin"]){
      $Where[] = " num_recibo <= ". $_POST["numrecibofin"];
      $_SESSION['numrecibofin'] = $_POST["numrecibofin"];
    }
    if ($_POST["id_paciente"]){
      $Where[] = " id_paciente = ". $_POST["id_paciente"];
      $_SESSION['id_paciente'] = $_POST["id_paciente"];
    }
    if ($_POST["fechainicial"]){
      $Where[] = " fecha_intervencion >= '". $miFecha->formatoDbFecha($_POST["fechainicial"])."'";
      $_SESSION['fechainicial'] = $_POST["fechainicial"];
    }
    if ($_POST["fechafinal"]){
      $Where[] = " fecha_intervencion <= '". $miFecha->formatoDbFecha($_POST["fechafinal"])."'";
      $_SESSION['fechafinal'] = $_POST["fechafinal"];
    }
    if ($_POST["id_tpoperacion"]){
      $Where[] = " id_tpoperacion = ". $_POST["id_tpoperacion"];
      $_SESSION['id_tpoperacion'] = $_POST["id_tpoperacion"];
    }
    if ($_POST["id_doctor_cirujano"]){
      $Where[] = " id_doctor_cirujano = ". $_POST["id_doctor_cirujano"];
      $_SESSION['id_doctor_cirujano'] = $_POST["id_doctor_cirujano"];
    }
    if ($_POST["id_doctor_anestesia"]){
      $Where[] = " id_doctor_anestesia = ". $_POST["id_doctor_anestesia"];
      $_SESSION['id_doctor_anestesia'] = $_POST["id_doctor_anestesia"];
    }
    if ($_POST["id_responsable"]){
      $Where[] = " id_responsable = ". $_POST["id_responsable"];
      $_SESSION['id_responsable'] = $_POST["id_responsable"];
    }
    if ($_POST["id_estatus"]){
      $Where[] = " id_estatus = ". $_POST["id_estatus"];
      $_SESSION['id_estatus'] = $_POST["id_estatus"];
    }

//    $ConsultaID = $PacienteIntervencion->consulta($Conexion_ID, join(" AND ", $Where));
    $_SESSION['condicion'] = join(" AND ", $Where);     
  } else {
  	if (!empty($_SESSION["numreciboini"])){
      $Where[] = " num_recibo >= ". $_SESSION['numreciboini'];
      $smarty->assign('numreciboini', $_SESSION["numreciboini"] );
    }
    if (!empty($_SESSION["numrecibofin"])){
      $Where[] = " num_recibo <= ". $_SESSION['numrecibofin'];
      $smarty->assign('numrecibofin', $_SESSION["numrecibofin"] );
    }
    if (!empty($_SESSION["id_paciente"])){
      $Where[] = " id_paciente = ". $_SESSION['id_paciente'];
      $smarty->assign('id_paciente', $_SESSION["id_paciente"] );
    }
    if (!empty($_SESSION["fechainicial"])){
      $Where[] = " fecha_intervencion >= '". $miFecha->formatoDbFecha($_SESSION["fechainicial"])."'";
      $smarty->assign('fechainicial', $_SESSION["fechainicial"] ); 
    }
    if (!empty($_SESSION["fechafinal"])){
      $Where[] = " fecha_intervencion <= '". $miFecha->formatoDbFecha($_SESSION["fechafinal"])."'";
      $smarty->assign('fechafinal', $_SESSION["fechafinal"] ); 
    }
    if (!empty($_SESSION["id_tpoperacion"])){
      $Where[] = " id_tpoperacion = ". $_SESSION["id_tpoperacion"];
      $smarty->assign('id_tpoperacion', $_SESSION["id_tpoperacion"] ); 
    }
    if (!empty($_SESSION["id_doctor_cirujano"])){
      $Where[] = " id_doctor_cirujano = ". $_SESSION["id_doctor_cirujano"];
      $smarty->assign('id_doctor_cirujano', $_SESSION["id_doctor_cirujano"] ); 
    }
    if (!empty($_SESSION["id_doctor_anestesia"])){
      $Where[] = " id_doctor_anestesia = ". $_SESSION["id_doctor_anestesia"];
      $smarty->assign('id_doctor_anestesia', $_SESSION["id_doctor_anestesia"] ); 
    }
    if (!empty($_SESSION["id_responsable"])){
      $Where[] = " id_responsable = ". $_SESSION["id_responsable"];
      $smarty->assign('id_responsable', $_SESSION["id_responsable"] ); 
    }
    if (!empty($_SESSION["id_estatus"])){
      $Where[] = " id_estatus = ". $_SESSION["id_estatus"];
      $smarty->assign('id_estatus', $_SESSION["id_estatus"] ); 
    }
  //  $ConsultaID = $PacienteIntervencion->consulta($Conexion_ID, $_SESSION['condicion']);
  }
  // if ($_POST["numrecibofin"]){
  //   $Where[] = " num_recibo <= ". $_POST["numrecibofin"];
  // }
  // if ($_POST["id_paciente"]){
  //   $Where[] = " id_paciente = ". $_POST["id_paciente"];
  // }
  // if ($_POST["fechainicial"]){
  //   $Where[] = " fecha_intervencion >= '". $miFecha->formatoDbFecha($_POST["fechainicial"])."'";
  // }
  // if ($_POST["fechafinal"]){
  //   $Where[] = " fecha_intervencion <= '". $miFecha->formatoDbFecha($_POST["fechafinal"])."'";
  // }
  // if ($_POST["id_tpoperacion"]){
  //   $Where[] = " id_tpoperacion = ". $_POST["id_tpoperacion"];
  // }
  // if ($_POST["id_doctor_cirujano"]){
  //   $Where[] = " id_doctor_cirujano = ". $_POST["id_doctor_cirujano"];
  // }
  // if ($_POST["id_doctor_anestesia"]){
  //   $Where[] = " id_doctor_anestesia = ". $_POST["id_doctor_anestesia"];
  // }
  // if ($_POST["id_responsable"]){
  //   $Where[] = " id_responsable = ". $_POST["id_responsable"];
  // }
  // if ($_POST["id_estatus"]){
  //   $Where[] = " id_estatus = ". $_POST["id_estatus"];
  // }

  #print join(" AND ", $Where);

  $ConsultaID = $PacienteIntervencion->consulta($Conexion_ID, join(" AND ", $Where));
// mostrarmos los registros
  
  $Recibos = array(); 
  $clase = "fondoetiqueta";
  while ($row = mysql_fetch_object($ConsultaID)) {

    $clase  = ( $clase == "fondoetiqueta" ) ? '' : "fondoetiqueta";
    $Datos["id"]               = $row->id;
    $Datos['num_recibo']       = $row->num_recibo;
    $Datos['nombre_paciente']  = strtoupper(utf8_encode($row->apellidopac.", ".$row->nombrepac));
    $Datos['fecha']            = $miFecha->formatoFecha($row->fecha_intervencion);
    $Datos['desctpopera']      = $row->desctpopera;
    $Datos['nombre_cirujano']  = strtoupper($row->apellidociru.", ".$row->nombreciru);
    $Datos['nombre_anestesia'] = strtoupper($row->apellidoanes.", ".$row->nombreanes);
    $Datos['monto_total']      = number_format($row->monto_total, 2, ",", ".");
    $Datos['nombre_respon']    = strtoupper($row->descrespon);
    $Datos['fecha_pago']       = ($row->id_estatus == 1) ? "&nbsp;" : $miFecha->formatoFecha($row->fecha_pago);
    $Datos['monto_pagado']     = ($row->id_estatus == 1) ? "&nbsp;" : number_format($row->monto_pagado, 2, ",", ".");
    $Datos['descestatus']      = strtoupper($row->descestatus);
    $Datos['id_estatus']       = strtoupper($row->id_estatus);
    $Datos['clase']            = $clase;

    $Recibos[$row->id] = $Datos;
  }

  if ($Recibos){
    $smarty->assign('ArrRecibos', $Recibos);
  }
  else{
    $smarty->assign('error_msg', 'No hay información para el criterio de búsqueda indicado');
  }

}

function buscarPacientes( $Conexion_ID, $Paciente ) {

  $Where =  array();
  if ($_POST["criterio"]){
    $Where[] = " LOWER(shistoria) like '%". strtolower($_POST["criterio"])."%'";
    $Where[] = " LOWER(snombre) like '%". strtolower($_POST["criterio"])."%'";
    $Where[] = " LOWER(sapellido) like '%". strtolower($_POST["criterio"])."%'";
  }

  $ConsultaID = $Paciente->consulta($Conexion_ID, join(" OR ", $Where));
// Retornamos los registros

  $Retorno = "";
  while ($row = mysql_fetch_row($ConsultaID)) {
    $Retorno .= $row[0].":".$row[1]." - ".$row[3].", ".$row[2]."|";
  }

  echo $Retorno;

}

function buscarIntervenciones( $Conexion_ID, $Intervencion ) {

  $Where =  array();
  if ($_POST["criterio"]){
    $Where[] = " LOWER(sdescripcion) like '%". strtolower($_POST["criterio"])."%'";
	  $Where[] = " bactivo = 1 ";
  }

  $ConsultaID = $Intervencion->consulta($Conexion_ID, join("AND", $Where));
// Retornamos los registros

  $Retorno = "";
  while ($row = mysql_fetch_row($ConsultaID)) {
    $Retorno .= $row[0].":".$row[1].":".$row[2]."|";
  }

  echo $Retorno;

}

?>
