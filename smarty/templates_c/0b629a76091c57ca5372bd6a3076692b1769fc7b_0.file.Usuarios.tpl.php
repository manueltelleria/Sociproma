<?php
/* Smarty version 3.1.30, created on 2017-03-09 13:18:33
  from "C:\xampp\htdocs\Sociproma\smarty\templates\Usuarios.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c14819a6ec17_86869548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b629a76091c57ca5372bd6a3076692b1769fc7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\Usuarios.tpl',
      1 => 1489059558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58c14819a6ec17_86869548 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Sociproma\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_function_html_checkboxes')) require_once 'C:\\xampp\\htdocs\\Sociproma\\libs\\plugins\\function.html_checkboxes.php';
?>

<?php echo '<script'; ?>
 language="JavaScript" src="js/calendar_eu.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 language="javascript">
function runMode( accion, Id ){
  forma = document.getElementById('fusuario');

  forma.accion.value = accion;
  forma.action = "CtrlUsuario.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && accion != "buscar" ){
    if (validate_fusuario(forma)){ forma.submit() };
  }
  else{
    forma.submit();
  }
  
}

function validate_fusuario (form) {
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

// susuario: standard text, hidden, password, or textarea box
  var susuario = form.elements['susuario'].value;
  if (susuario == null || susuario == "" ) {
    alertstr += '- Indique un valor válido para el campo "Usuario"\n';
    invalid++;
  }

// scontrasena: standard text, hidden, password, or textarea box
  var scontrasena = form.elements['scontrasena'].value;
  if (scontrasena == null || susuario == "" ) {
    alertstr += '- Indique un valor válido para el campo "Contrase&ntile;a"\n';
    invalid++;
  }

// sconfirma: standard text, hidden, password, or textarea box
  var sconfirma = form.elements['scontrasena'].value;
  if (sconfirma == null || sconfirma == "" ) {
    alertstr += '- Indique un valor válido para el campo "Confirmar Contrase&ntilde;a"\n';
    invalid++;
  }

  if (scontrasena && sconfirma){
    if (scontrasena != sconfirma){
      alertstr += '- El valor indicado en la casilla de confirmaci&oacute;n es distinto a la contrase&ntilde;a\n';
      invalid++;
    }
  }

  var scorreo = form.scorreo.value;
  if (scorreo){
    if (!scorreo.match(/^\w+([\.-]?\w+)*@[a-zA-Z0-9][-a-zA-Z0-9\.]*\.[a-zA-Z]+$/)){
        alertstr += '- El valor indicado en "Correo electr&oacute;nico" debe ser una direcci&oacute;n de correo valida\n';
        invalid++;
    }
  }

  if (invalid > 0 || alertstr != '') {
    if (! invalid) invalid = 'Los Siguiemtes';   // catch for programmer error
    alert(''+invalid+' error(es) fueron encontrados al enviar la informaci&oacute;n:'+'\n\n'
    +alertstr+'\n'+'- Por favor corrija los campos y trate de nuevo');
    return false;
  }
  return true;  // all checked ok
}

function llenaValores(){
  form = document.getElementById('fusuario');
  var id_doctor = form.id_doctor.value;

 for (var loop = 0; loop < form.elements['id_doctor'].options.length; loop++) {
    if (form.elements['id_doctor'].options[loop].selected) {
      var CadenaNombre = form.elements['id_doctor'].options[loop].label;
      var Nombres = CadenaNombre.split(',');
    } // if
  } // for id_doctor

  if (id_doctor != 99 && id_doctor != 0){
    form.snombre.value   = Nombres[1];
    form.sapellido.value = Nombres[0];
    form.snombre.readOnly = "true";
    form.sapellido.readOnly = 1;
  }

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

<FORM METHOD="post" name="fusuario" id="fusuario" ACTION="CtrlUsuario.php">
<fieldset style="background-color : #e3e3e3">
<legend>Datos Usuarios</legend>
<table width="100%">
  <tr>
    <td nowrap><b>Si el usuario es doctor seleccionelo</b></td>
    <td><select name="id_doctor" id="id_doctor" onchange=" llenaValores(); ">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['doctor_options']->value,'selected'=>$_smarty_tpl->tpl_vars['id_doctor']->value),$_smarty_tpl);?>

        </select>
    </td>
  </tr>
  <tr>
    <td width="15%"><b>Nombre:</b></td>
    <td align="left"><input type="text" name="snombre" id="snombre" size="30" value="<?php echo $_smarty_tpl->tpl_vars['snombre']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td width="15%"><b>Apellido:</b></td>
    <td align="left"><input type="text" name="sapellido" id="sapellido" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sapellido']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Usuario:</b></td>
    <td><input type="text" name="susuario" id="susuario" size="30" value="<?php echo $_smarty_tpl->tpl_vars['susuario']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Contrase&ntilde;a:</b></td>
    <td><input type="password" name="scontrasena" id="scontrasena" size="10" value="<?php echo $_smarty_tpl->tpl_vars['scontrasena']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Confirmar Contrase&ntilde;a:</b></td>
    <td><input type="password" name="sconfirma" id="sconfirma" size="10" value="<?php echo $_smarty_tpl->tpl_vars['sconfirma']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Correo Electr&oacute;nico:</b></td>
    <td><input type="scorreo" name="scorreo" id="scorreo" size="30" value="<?php echo $_smarty_tpl->tpl_vars['scorreo']->value;?>
"></td>
  </tr>
  <tr>
    <td><b>Administrador:</b></td>
    <td><?php echo smarty_function_html_checkboxes(array('name'=>"badministrador",'values'=>$_smarty_tpl->tpl_vars['adm_ids']->value,'output'=>$_smarty_tpl->tpl_vars['adm_names']->value,'selected'=>$_smarty_tpl->tpl_vars['adm_id']->value,'separator'=>"<br />"),$_smarty_tpl);?>
</td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" onClick=" runMode('buscar','');"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="reset" id="btnCancelar" value="Cancelar"><input type="button" id="btnEnviar" onClick=" runMode('enviar', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" value="Enviar">
    </td>
  </tr>
</table>
</fieldset>
<br/><br/>
<table width="75%" cellpadding="1" align="center">
  <tr class="titulodonforojo">
     <th>Nombre</th>
     <th>Apellido</th>
     <th>Usuario</th>
     <th>Correo Electr&oacute;nico</th>
     <th></th>
     <th></th>
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrUsuarios']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
    <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['snombre'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['sapellido'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['susuario'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['scorreo'];?>
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
