<?php
/* Smarty version 3.1.30, created on 2017-03-16 15:03:42
  from "C:\xampp\htdocs\Sociproma\smarty\templates\Paciente_Intervencion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca9b3ee28df8_09514512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78b55a38b88021fb40c9d868a84af9c117cd2c7e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\Paciente_Intervencion.tpl',
      1 => 1489673019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58ca9b3ee28df8_09514512 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Sociproma\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 language="JavaScript" src="js/calendar_eu.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="js/prototype/prototype.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/seleccionarItemList.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

cont_fila=0; 
Arraymontos = new Array();

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">

//Función cargarCaomboPaciente: se encarga de cargar el contenido de las listas Paciente depediendo del criterio de busqueda en el campo criterio
function cargarCombo( listaLlenar ){
  var forma = document.fpaciente_intervencion;
  var url = '/CtrlPacienteIntervencion.php';
  campo = eval('forma.'+listaLlenar);
  if ( listaLlenar == 'id_paciente' ){
    var funcion = eval('llenar_id_paciente');
  var accion = 'buscarPacientes';
  }
  else{
    var funcion = eval('llenar_'+listaLlenar);
    var accion = 'buscarIntervenciones';
  }
  var valorCriterio = forma.criterio.value;
  if ( listaLlenar == "id_intervencion_0" ){
    valorCriterio = forma.criterio_0.value;
  }
  else if ( listaLlenar == "id_intervencion_1" ){
     valorCriterio = forma.criterio_1.value;
  }
  else if ( listaLlenar == "id_intervencion_2" ){
     valorCriterio = forma.criterio_2.value;
  }
  else if ( listaLlenar == "id_intervencion_3" ){
     valorCriterio = forma.criterio_3.value;
  }
  else if ( listaLlenar == "id_intervencion_4" ){
     valorCriterio = forma.criterio_4.value;
  }

  if (valorCriterio) {
    if (valorCriterio.length > 3){
      var param = "criterio="+valorCriterio+"&accion="+accion;
      var myAjax = new Ajax.Request( url, { method: 'post', parameters: param , onComplete: funcion } );
    }
  }
  else {
    vaciarLista(campo);
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_paciente(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_paciente);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_paciente,new Option(elemento[1],elemento[0]));
    }
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_0(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_0);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_0,new Option(elemento[1],elemento[0]));
//      Arraymontos[elemento[0]] = elemento[2];
    }
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_1(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_1);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_1,new Option(elemento[1],elemento[0]));
    }
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_2(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_2);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_2,new Option(elemento[1],elemento[0]));
    }
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_3(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_3);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_3,new Option(elemento[1],elemento[0]));
    }
  }
}

//Función llenar_id_paciente: Método encargado de hacer el llamado al método llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_4(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_4);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_4,new Option(elemento[1],elemento[0]));
    }
  }
}

function runMode( accion, Id ){
  forma = document.getElementById('fpaciente_intervencion');

  forma.accion.value = accion;
  forma.action = "CtrlPacienteIntervencion.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && 
      accion != "buscar" && accion != "crear_paciente" && 
      accion != "crear_responsable" && accion != "volver" &&
      accion != "pagar_recibo" ){
    if (validate_fpaciente_intervencion(forma)){ forma.submit() };
  } else if( accion == "crear_paciente"){
    forma.action = "CtrlPaciente.php";
    forma.submit();
  } else if( accion == "crear_responsable"){
    forma.action = "CtrlResponsable.php";
    forma.submit();
  } else if( accion == "pagar_recibo"){
    forma.action = "CtrlPacienteIntervencion.php";
    forma.submit();
  }else if( accion == "volver"){
    forma.submit();
  }
  else{
    forma.submit();
  }
}

function validate_fpaciente_intervencion (form) {
  var alertstr = '';
  var invalid  = 0;

// numrecibo: standard text, hidden, password, or textarea box
  var num_recibo = form.elements['num_recibo'].value;
  if (num_recibo == null || num_recibo == "" ) {
    alertstr += '- Indique un valor válido para el campo "Número de Recibo"\n';
    invalid++;
  }
  else{
    if (!num_recibo.match(/^-?\s*[0-9]+$/)){
    alertstr += '- Indique un valor válido para el campo "Número de Recibo"\n';
      invalid++;
  }
  }

// id_paciente: select list, always assume it's multiple to get all values
  var id_paciente = 0;
  var selected_id_paciente = 0;
  for (var loop = 0; loop < form.elements['id_paciente'].options.length; loop++) {
    if (form.elements['id_paciente'].options[loop].selected) {
      id_paciente = form.elements['id_paciente'].options[loop].value;
      selected_id_paciente++;
      if (id_paciente == 0 || id_paciente === 0) {
        alertstr += '- Seleccione una opción para el campo "Paciente"\n';
        invalid++;
      }
    } // if
  } // for id_paciente

// fecha: standard text, hidden, password, or textarea box
  var fecha = form.elements['fecha'].value;
  if (fecha == null || fecha == "" ) {
    alertstr += '- Indique un valor válido para el campo "Fecha"\n';
    invalid++;
  }
  else{
    if (!fecha.match(/^(0?[1-9]|[1-2][0-9]|3[0-1])\/?(0?[1-9]|1[0-2])\/?[0-9]{4}$/)){
      alertstr += '- Indique un valor válido para el campo "Fecha"\n';
      invalid++;
    }
  }

// id_doctor_cirujano: select list, always assume it's multiple to get all values
  var id_doctor_cirujano = 0;
  var selected_id_doctor_cirujano = 0;
  for (var loop = 0; loop < form.elements['id_doctor_cirujano'].options.length; loop++) {
    if (form.elements['id_doctor_cirujano'].options[loop].selected) {
      id_doctor_cirujano = form.elements['id_doctor_cirujano'].options[loop].value;
      selected_id_doctor_cirujano++;
      if (id_doctor_cirujano == 0 || id_doctor_cirujano === 0) {
        alertstr += '- Seleccione una opción para el campo "Cirujano"\n';
        invalid++;
      }
    } // if
  } // for id_doctor_cirujano

// id_doctor_anestesia: select list, always assume it's multiple to get all values
  var id_doctor_anestesia = 0;
  var selected_id_doctor_anestesia = 0;
  for (var loop = 0; loop < form.elements['id_doctor_anestesia'].options.length; loop++) {
    if (form.elements['id_doctor_anestesia'].options[loop].selected) {
      id_doctor_anestesia = form.elements['id_doctor_anestesia'].options[loop].value;
      selected_id_doctor_anestesia++;
      if (id_doctor_anestesia == 0 || id_doctor_anestesia === 0) {
        alertstr += '- Seleccione una opción para el campo "Anestesiologo"\n';
        invalid++;
      }
    } // if
  } // for id_doctor_anestesia

// monto_total: standard text, hidden, password, or textarea box
  var monto_total = form.elements['monto_total'].value;
  if (monto_total == null || monto_total == "" ) {
    alertstr += '- Indique un valor válido para el campo "Monto Total"\n';
    invalid++;
  }

  for (var i=0; i<=4; i++){
    var linea = i + 1;
    var Cuantos = 0;
    var SelInter = document.getElementById('id_intervencion_'+i);
    if (SelInter){
      var id_Inter = 0;
      var selected_id_interven = 0;
      if ( SelInter.options.length == 0){
        alertstr += '- Seleccione una opción para el campo "Intervencion" '+linea+'\n';
        invalid++;
      }
      else{
        for (var loop = 0; loop < SelInter.options.length; loop++) {
          if (SelInter.options[loop].selected) {
            id_Inter = SelInter.options[loop].value;
            selected_id_interven++;
            if (id_Inter == 0 || id_Inter === 0) {
              alertstr += '- Seleccione una opción para el campo "Intervencion" '+linea+'\n';
              invalid++;
            }
          } // if
        } // for id_intervencion
      } 
    } 
  }

  if (invalid > 0 || alertstr != '') {
    if (! invalid) invalid = 'Los Siguiemtes';   // catch for programmer error
    alert(''+invalid+' error(es) fueron encontrados al enviar la información:'+'\n\n'
    +alertstr+'\n'+'- Por favor corrija los campos y trate de nuevo');
    return false;
  }
  return true;  // all checked ok
}

function calcula_monto( ){
  var value_sap       = document.fpaciente_intervencion.monto_sap.value;
  var value_preva     = document.fpaciente_intervencion.monto_preva.value;
  var value_anestesia = document.fpaciente_intervencion.monto_anestesia.value;

  if (value_sap.indexOf(",") != -1 ){
    value_sap = value_sap.replace(".",'');
    value_sap = value_sap.replace(",",'.');
  }
  if (value_preva.indexOf(",") != -1 ){
    value_preva = value_preva.replace(".",'');
    value_preva = value_preva.replace(",",'.');
  }
  if (value_anestesia.indexOf(",") != -1 ){
    value_anestesia = value_anestesia.replace(".",'');
    value_anestesia = value_anestesia.replace(",",'.');
  }
  var monto_sap       = parseFloat(value_sap).toFixed(2);
  var monto_preva     = parseFloat(value_preva).toFixed(2);
  var monto_anestesia = parseFloat(value_anestesia).toFixed(2);
  var monto_total;

  monto_total = parseFloat(monto_sap) + parseFloat(monto_preva) + parseFloat(monto_anestesia);

  if (value_sap.indexOf(",") == -1){
   document.fpaciente_intervencion.monto_sap.value = formatearMoneda(value_sap);
  }
  if (value_preva.indexOf(",") == -1){
    document.fpaciente_intervencion.monto_preva.value = formatearMoneda(value_preva);
  }
  if (value_anestesia.indexOf(",") == -1){
    document.fpaciente_intervencion.monto_anestesia.value = formatearMoneda(value_anestesia);
  }
  document.fpaciente_intervencion.monto_total.value = formatearMoneda(monto_total);
                                                      
}
<?php echo '</script'; ?>
>


<LINK HREF="css/anestesia.css" REL="stylesheet" TYPE="text/css">
<link rel="stylesheet" href="calendar.css"> 
<table width="100%">
<tr>
<td class="tituloforma" align="center"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</td>
</tr>
</table>

<FORM METHOD="post" name="fpaciente_intervencion" id="fpaciente_intervencion" ACTION="CtrlPaciente_Intervencion.php">
<?php if ($_smarty_tpl->tpl_vars['bpagar']->value != 1) {?>
  <fieldset style="background-color : #e3e3e3">
  <legend>Datos Intervención por Paciente</legend>
  <table width="100%" border=0>
    <tr>
      <td width="15%"><b>Número de Recibo:</b></td>
      <td align="left"><input type="text" name="num_recibo" id="num_recibo" size="10" value="<?php echo $_smarty_tpl->tpl_vars['num_recibo']->value;?>
"><b>*</b></td>
    </tr>
    <?php if ($_SESSION['id_paciente'] != '') {?>
      <tr>
        <td width="15%"><b>Paciente:</b></td>
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['nombre_paciente']->value;?>
</b></td>
      </tr>
    <?php } else { ?>    
      <tr>
        <td width="15%"><b>Paciente:</b></td>
        <td align="left"><input type="text" name="criterio" id="criterio" size="15" onKeyup="cargarCombo('id_paciente');">&nbsp;
          <select name="id_paciente" id="id_paciente">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['pacien_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_paciente']->value),$_smarty_tpl);?>

          </select><b>*</b>&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_paciente' ); ">Paciente Nuevo</a>
        </td>
      </tr>
    <?php }?>
    <tr>
      <td width="15%"><b>Fecha de la Intervención:</b></td>
      <td>
        <INPUT TYPE="text" NAME="fecha" id="fecha" SIZE="10" value="<?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
">
  
        <?php echo '<script'; ?>
 language="JavaScript"> 
    new tcal ({
      // form name
      'formname': 'fpaciente_intervencion',
      // input name
      'controlname': 'fecha'
    });
         <?php echo '</script'; ?>
>
  
         <b>*</b>
      </td>
    <tr>
      <td><b>Tipo de Operación:</b></td>
       <td align="left">
        <select name="id_tpoperacion" id="id_tpoperacion">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tpopera_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_tpoperacion']->value),$_smarty_tpl);?>

        </select>
      </td>
    </tr>
    <tr>
      <td><b>Cirujano:</b></td>
      <td>
        <select name="id_doctor_cirujano" id="id_doctor_cirujano">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['doctorCiru_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_doctor_cirujano']->value),$_smarty_tpl);?>

        </select><b>*</b>  
      </td>
    </tr>
    <tr>
      <td><b>Anestesiologo:</b></td>
      <td>
        <select name="id_doctor_anestesia" id="id_doctor_anestesia">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['doctorAnes_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_doctor_anestesia']->value),$_smarty_tpl);?>

        </select><b>*</b>  
      </td>
    </tr>
    <tr>
      <td><b>Monto SAP:</b></td>
      <td><input type="text" name="monto_sap" id="monto_sap" size="17" value="<?php echo $_smarty_tpl->tpl_vars['monto_sap']->value;?>
" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Pre-Evaluación:</b></td>
      <td><input type="text" name="monto_preva" id="monto_preva" size="17" value="<?php echo $_smarty_tpl->tpl_vars['monto_preva']->value;?>
" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Anestesia:</b></td>
      <td><input type="text" name="monto_anestesia" id="monto_anestesia" size="17" value="<?php echo $_smarty_tpl->tpl_vars['monto_anestesia']->value;?>
" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Total:</b></td>
      <td><input type="text" name="monto_total" id="monto_total" size="17" value="<?php echo $_smarty_tpl->tpl_vars['monto_total']->value;?>
"><b>*</b></td>
    </tr>
    <tr>
      <td><b>Responsable:</b></td>
      <td>
        <select name="id_responsable" id="id_responsable">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['respon_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_responsable']->value),$_smarty_tpl);?>

        </select>&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_responsable' ); ">Responsable Nuevo</a>
      </td>
    </tr>
    <tr>
      <td><b>Tipo Intervención:</b></td>
      <td>
        <select name="id_intervencion" id="id_intervencion">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['interven_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_intervencion']->value),$_smarty_tpl);?>

        </select>
      </td>
    </tr>
    <tr>
      <td><b>Observación:</b></td>
      <td><input type="text" name="sobservacion" id="sobservacion" size="60" value="<?php echo $_smarty_tpl->tpl_vars['sobservacion']->value;?>
"></td>
    </tr>
    <tr>
      <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
    </tr>
  </table>
  </fieldset>
<?php } else { ?>
  <fieldset style="background-color : #e3e3e3">
  <legend>Datos del Pago del Recibo</legend>
  <table width="100%" border=0>
    <tr>
      <td width="15%"><b>Número de Recibo:</b></td>
      <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['num_recibo']->value;?>
</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Paciente:</b></td>
      <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['nombre_paciente']->value;?>
</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Cirujano:</b></td>
      <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['nombre_cirujano']->value;?>
</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Anestesiólogo:</b></td>
      <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['nombre_anestesiologo']->value;?>
</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Fecha de Pago:</b></td>
    <td>
      <INPUT TYPE="text" NAME="fecha_pago" id="fecha_pago" SIZE="10">

      <?php echo '<script'; ?>
 language="JavaScript"> 
  new tcal ({
    // form name
    'formname': 'fpaciente_intervencion',
    // input name
    'controlname': 'fecha_pago'
  });
       <?php echo '</script'; ?>
>

       <b>*</b>
    </td>
    </tr>
    <tr>
      <td width="15%"><b>Monto Pagado:</b></td>
      <td align="left"><input type="text" name="monto_pagado" id="monto_pagado" size="15" onchange="formatearMoneda(this.value)"></td>       
    </tr>
  </table>
  </fieldset>
<?php }?>  
<br/><br/>
<table width="75%" cellpadding="1" align="center" id="tabla">
    <tr>
      <td align="center">
        <input type="reset" id="btnCancelar" value="Cancelar">
        <?php if ($_smarty_tpl->tpl_vars['bpagar']->value != 1) {?>
          <input type="button" id="btnEnviar" onClick=" runMode('enviar', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" value="Enviar">
        <?php } else { ?>
          <input type="button" id="btnEnviar" onClick=" runMode('pagar_recibo', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" value="Enviar">
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['bvolver']->value == 1) {?>
          <input type="button" id="btnVolver" onClick=" runMode('volver');" value="Volver">
        <?php }?>
      </td>
    </tr>
</table>
<input type="hidden" name="accion" id="accion">
<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
</FORM>

</body>
</html>
<?php }
}
