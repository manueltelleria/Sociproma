<?php
/* Smarty version 3.1.30, created on 2017-03-16 12:42:23
  from "C:\xampp\htdocs\Sociproma\smarty\templates\BuscarRecibos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca7a1fbc8f76_27593280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab3f873df6222cfbf5fb3bd6fb629dd723d2f151' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\BuscarRecibos.tpl',
      1 => 1489663527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58ca7a1fbc8f76_27593280 (Smarty_Internal_Template $_smarty_tpl) {
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
 language="javascript">

//Función cargarCaomboPaciente: se encarga de cargar el contenido de las listas Paciente depediendo del criterio de busqueda en el campo criterio
function cargarCombo( listaLlenar ){
  var forma = document.busca_recibo;
  var url = '/CtrlBuscarRecibo.php';
  campo = eval('forma.'+listaLlenar);
  if ( listaLlenar == 'id_paciente' ){
    var funcion = eval('llenar_id_paciente');
  var accion = 'buscarPacientes';
  }
  valorCriterio = forma.criterio.value;
  if (valorCriterio) {
    if (valorCriterio.length > 3) {
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
  var forma = document.busca_recibo;
  vaciarLista(forma.id_paciente);
    if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_paciente,new Option(elemento[1],elemento[0]));
    }
  }
}

function runMode( accion, Id ){
  forma = document.getElementById('busca_recibo');

  forma.accion.value = accion;
  forma.action = "CtrlBuscarRecibo.php";
  forma.id.value = Id;

  if ( accion == "ver" ){
    forma.accion.value = "actualiza";
    forma.action = "CtrlPacienteIntervencion.php";
  }

  if ( accion == "pagar" ){
    forma.accion.value = "pagar";
    forma.action = "CtrlPacienteIntervencion.php";
  }

  if (accion == "generar" ){
    if (validate_busca_recibo(forma)){ 
      forma.action = "ReporteRecibo.php";
      forma.submit() 
    }
  }

  if (accion == "buscar" ){
    if (validate_busca_recibo(forma)){ forma.submit() };
  }
  else{
    forma.submit();
  }
}

function validate_busca_recibo (form) {
  var alertstr = '';
  var invalid  = 0;

// numreciboini: standard text, hidden, password, or textarea box
  var numreciboini = form.numreciboini.value;
  if (numreciboini){
    if (!numreciboini.match(/^-?\s*[0-9]+$/)){
      alertstr += '- Indique un valor válido para el campo "Número de Recibo Inicial"\n';
      invalid++;
    }
  }

// numrecibofin: standard text, hidden, password, or textarea box
  var numrecibofin = form.numrecibofin.value;
  if (numrecibofin){
    if (!numrecibofin.match(/^-?\s*[0-9]+$/)){
      alertstr += '- Indique un valor válido para el campo "Número de Recibo Final"\n';
      invalid++;
    }
  }

  var fechainicial = form.fechainicial.value;
  if (fechainicial){
    if (!fechainicial.match(/^(0?[1-9]|[1-2][0-9]|3[0-1])\/?(0?[1-9]|1[0-2])\/?[0-9]{4}$/)){
        alertstr += '- Indique un valor válido para el campo "Fecha Inicial"\n';
        invalid++;
    }
  }

  var fechafinal = form.fechafinal.value;
  if (fechafinal){
    if (!fechafinal.match(/^(0?[1-9]|[1-2][0-9]|3[0-1])\/?(0?[1-9]|1[0-2])\/?[0-9]{4}$/)){
        alertstr += '- Indique un valor válido para el campo "Fecha Final"\n';
        invalid++;
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

<FORM METHOD="post" name="busca_recibo" id="busca_recibo" ACTION="CtrlBuscarRecibo.php">
<fieldset style="background-color : #e3e3e3">
<legend>Critério de Búsqueda</legend>
<table width="100%">
  <tr>
    <td nowrap width="25%"><b>Número de Recibo Inicial:</b></td>
    <td width="25%" align="left"><input type="text" name="numreciboini" id="num_reciboini" size="10" value="<?php echo $_smarty_tpl->tpl_vars['numreciboini']->value;?>
"></td>
    <td width="25%" nowrap><b>Número de Recibo Final:</b></td>
    <td width="25%" align="left"><input type="text" name="numrecibofin" id="num_recibofin" size="10" value="<?php echo $_smarty_tpl->tpl_vars['numrecibofin']->value;?>
"></td>
  </tr>
  <tr>
    <td><b>Paciente:</b></td>
    <td colspan="3" align="left"><input type="text" name="criterio" id="criterio" size="15" onKeyup="cargarCombo('id_paciente');">&nbsp;
      <select name="id_paciente" id="id_paciente">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['pacien_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_apciente']->value),$_smarty_tpl);?>

      </select>
    </td>
  </tr>
  <tr>
    <td width="15%"><b>Fecha Inicial:</b></td>
    <td>
      <INPUT TYPE="text" NAME="fechainicial" id="fechainicial" SIZE="10" value="<?php echo $_smarty_tpl->tpl_vars['fechainicial']->value;?>
">

      <?php echo '<script'; ?>
 language="JavaScript"> 
  new tcal ({
    // form name
    'formname': 'busca_recibo',
    // input name
    'controlname': 'fechainicial'
  });
       <?php echo '</script'; ?>
>

    </td>
    <td width="15%"><b>Fecha Final:</b></td>
    <td>
      <INPUT TYPE="text" NAME="fechafinal" id="fechafinal" SIZE="10" value="<?php echo $_smarty_tpl->tpl_vars['fechafinal']->value;?>
">

      <?php echo '<script'; ?>
 language="JavaScript"> 
  new tcal ({
    // form name
    'formname': 'busca_recibo',
    // input name
    'controlname': 'fechafinal'
  });
       <?php echo '</script'; ?>
>

    </td>
  </tr>
  <tr>
    <td><b>Tipo de Operación:</b></td>
     <td colspan="3" align="left">
      <select name="id_tpoperacion" id="id_tpoperacion">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tpopera_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_tpoperacion']->value),$_smarty_tpl);?>

      </select>
    </td>
  </tr>
  <tr>
    <td><b>Cirujano:</b></td>
    <td colspan="3"><select name="id_doctor_cirujano" id="id_doctor_cirujano">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['doctorCiru_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_doctor_cirujano']->value),$_smarty_tpl);?>

      </td>
  </tr>
  <tr>
    <td><b>Anestesiologo:</b></td>
    <td colspan="3"><select name="id_doctor_anestesia" id="id_doctor_anestesia">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['doctorAnes_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_doctor_anestesia']->value),$_smarty_tpl);?>

    </td>
  </tr>
  <tr>
    <td><b>Monto Total:</b></td>
    <td colspan="3"><input type="text" id="monto_total" size="17" value="<?php echo $_smarty_tpl->tpl_vars['monto_total']->value;?>
"></td>
  </tr>
  <tr>
    <td><b>Responsable:</b></td>
    <td colspan="3"><select name="id_responsable" id="id_responsable">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['respon_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_responsable']->value),$_smarty_tpl);?>

    </td>
  </tr>
  <tr>
    <td><b>Estatus:</b></td>
    <td colspan="3"><select name="id_estatus" id="id_estatus">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['estatus_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_estatus']->value),$_smarty_tpl);?>

    </td>
  </tr>
</table>
</fieldset>
<br/><br/>
<table width="75%" cellpadding="1" align="center" id="tabla">
    <tr>
      <td valign="center" align="center">
        <input type="reset" id="btnCancelar" value="Cancelar">
        <input type="button" id="Buscar" onClick=" runMode('buscar');" value="Buscar">
        <?php if ($_smarty_tpl->tpl_vars['ArrRecibos']->value) {?>        
          <a href="#" onclick=" runMode( 'generar' )"><img src="imagenes/pdf.jpg"></a>
        <?php } else { ?>
          &nbsp;
        <?php }?>
      </td>
    </tr>
</table>
<br/><br/>
<table width="90%" cellpadding="1" align="center" id="tabla">
  <tr class="titulodonforojo">
     <th>Recibo</th>
     <th>Fecha</th>
     <th>Paciente</th>
     <th>Tipo</th>
     <th>Cirujano</th>
     <th>Anestesiologo</th>
     <th>Monto</th>
     <th>Responsable</th>
     <th>Fecha Pago</th>
     <th>Monto Pagado</th>
     <th>Estatus</th>
     <th>Editar</th>
     <th>Pagar</th>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['ArrRecibos']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrRecibos']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
      <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['num_recibo'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['fecha'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_paciente'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['field']->value['desctpopera'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_cirujano'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_anestesia'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['field']->value['monto_total'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_respon'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['fecha_pago'];?>
</td>
        <td align="right"><?php echo $_smarty_tpl->tpl_vars['field']->value['monto_pagado'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['descestatus'];?>
</td>
        <td align="center">
          <?php if ($_smarty_tpl->tpl_vars['field']->value['id_estatus'] == 1) {?>
            <a href="#" onclick="runMode( 'ver', <?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
 );"><img src="imagenes/b_edit.png"></a></td>
          <?php } else { ?>
            &nbsp;
          <?php }?>
        </td>
        <td align="center">
          <?php if ($_smarty_tpl->tpl_vars['field']->value['id_estatus'] == 1) {?>
            <a href="#" onclick="runMode( 'pagar', <?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
 );"><img width="25px" height="25px" src="imagenes/carduse_card_payment_5122.png"></a></td>
          <?php } else { ?>
            &nbsp;
          <?php }?>
        </td>
      </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

 <?php }?>
</table>
<input type="hidden" name="accion" id="accion">
<input type="hidden" name="id" id="id">
</FORM>
<?php }
}
