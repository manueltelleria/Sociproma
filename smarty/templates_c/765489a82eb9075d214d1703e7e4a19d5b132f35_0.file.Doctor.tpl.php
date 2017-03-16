<?php
/* Smarty version 3.1.30, created on 2017-03-09 13:18:36
  from "C:\xampp\htdocs\Sociproma\smarty\templates\Doctor.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c1481cc81873_03292129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '765489a82eb9075d214d1703e7e4a19d5b132f35' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\Doctor.tpl',
      1 => 1489059558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58c1481cc81873_03292129 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Sociproma\\libs\\plugins\\function.html_options.php';
?>

<?php echo '<script'; ?>
 language="JavaScript" src="js/calendar_eu.js"><?php echo '</script'; ?>
> 

<?php echo '<script'; ?>
 language="javascript">
function runMode( accion, Id ){
  forma = document.getElementById('fdoctor');

  forma.accion.value = accion;
  forma.action = "CtrlDoctor.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" ){
    if (validate_fdoctor(forma)){ forma.submit() };
  }
  else{
    forma.submit();
  }
}

function validate_fdoctor (form) {
  var alertstr = '';
  var invalid  = 0;

// snombre: standard text, hidden, password, or textarea box
  var snombre = form.elements['snombre'].value;
  if (snombre == null || snombre == "" ) {
    alertstr += '- Indique un valor válido para el campo "Nombre"\n';
    invalid++;
  }

// sapellido: standard text, hidden, password, or textarea box
  var sapellido = form.elements['sapellido'].value;
  if (sapellido == null || sapellido == "" ) {
    alertstr += '- Indique un valor válido para el campo "Apellido"\n';
    invalid++;
  }

// stelefono: standard text, hidden, password, or textarea box
  var stelefono = form.elements['stelefono'].value;
  if (stelefono == null || stelefono == "" ) {
    alertstr += '- Indique un valor válido para el campo "N&uacute;mero Telef&oacute;nico"\n';
    invalid++;
  }
  else{
    if (!stelefono.match(/^[0-9]+-[0-9]*$/)) {
      alertstr += '- El n&uacute;mero telef&oacute;nico debe cumplir con el formato que se indica "0212-12345678"\n';
      invalid++;
    }
  }

// id_especialidad: select list, always assume it's multiple to get all values
  var id_especialidad = 0;
  var selected_id_especialidad = 0;
  for (var loop = 0; loop < form.elements['id_especialidad'].options.length; loop++) {
    if (form.elements['id_especialidad'].options[loop].selected) {
      id_especialidad = form.elements['id_especialidad'].options[loop].value;
      selected_id_especialidad++;
      if (id_especialidad == 0 || id_especialidad === 0) {
        alertstr += '- Seleccione una opci&oacute;n para el campo "Especialidad"\n';
        invalid++;
      }
    } // if
  } // for id_especialidad

  if (invalid > 0 || alertstr != '') {
    if (! invalid) invalid = 'Los Siguiemtes';   // catch for programmer error
    alert(''+invalid+' error(es) fueron encontrados al enviar la informaci&oacute;n:'+'\n\n'
    +alertstr+'\n'+'- Por favor corrija los campos y trate de nuevo');
    return false;
  }
  return true;  // all checked ok
}
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<LINK HREF="css/anestesia.css" REL="stylesheet" TYPE="text/css">
<link rel="stylesheet" href="calendar.css"> 
<table width="100%">
<tr>
<td class="tituloforma" align="center"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</td>
</tr>
</table>

<FORM METHOD="post" name="fdoctor" id="fdoctor" ACTION="CtrlDoctor.php">
<fieldset style="background-color : #e3e3e3">
<legend>Datos Doctor</legend>
<table width="100%">
  <tr>
    <td width="15%"><b>Nombre:</b></td>
    <td align="left"><input type="text" name="snombre" id="snombre" size="30" value="<?php echo $_smarty_tpl->tpl_vars['snombre']->value;?>
"> <b>*</b></td>
  </tr>
  <tr>
    <td width="15%"><b>Apellido:</b></td>
    <td align="left"><input type="text" name="sapellido" id="sapellido" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sapellido']->value;?>
"> <b>*</b></td>
  </tr>
  <tr>
    <td><b>N&uacute;mero Telef&oacute;nico:</b></td>
    <td><input type="text" name="stelefono" id="stelefono" size="14" value="<?php echo $_smarty_tpl->tpl_vars['stelefono']->value;?>
"><b>Ejm. 0414-12345678 *</b></td>
  </tr>
  <tr>
    <td><b>N&uacute;mero Telef&oacute;nico:</b></td>
    <td><input type="text" name="stelefono_1" id="stelefono_1" size="14" value="<?php echo $_smarty_tpl->tpl_vars['stelefono_1']->value;?>
"><b>Ejm. 0414-12345678 (Opcional)</b></td>
  </tr>
  <tr>
    <td><b>Especialidad:</b></td>
    <td><select name="id_especialidad" id="id_especialidad">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['esp_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_especialidad']->value),$_smarty_tpl);?>

        </select>
    <b>*</b> </td>
  </tr>
  <tr>
    <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="reset" id="btnCancelar" value="Cancelar"><input type="button" id="btnEnviar" onClick=" runMode('enviar', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" value="Enviar"></td>
  </tr>
</table>
</fieldset>
<br/><br/>
<table width="75%" cellpadding="1" align="center">
  <tr class="titulodonforojo">
     <th>Nombre</th>
     <th>Apellido</th>
     <th>Tel&eacute;fono</th>
     <th>Tel&eacute;fono Opc.</th>
     <th>Especialidad</th>
     <th></th>
     <th></th>
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrDoctores']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
    <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['snombre'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['sapellido'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['stelefono'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['stelefono_1'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['desc_especialidad'];?>
</td>
      <td align="center"><a href="#" onclick="runMode( 'actualiza', <?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
 );"><img width="15xp" heith="15xp" src="/sociproma/imagenes/b_edit.png"></a></td>
      <td align="center"><a href="javascript:if (confirm('Desea eliminar el registro'))runMode( 'elimina', <?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
 );"><img src="/sociproma/imagenes/b_drop.png"></a></td>
    </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<input type="hidden" name="accion" id="accion">
<input type="hidden" name="id" id="id">
</FORM>
<?php }
}
