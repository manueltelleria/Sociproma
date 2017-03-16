<?php
/* Smarty version 3.1.30, created on 2017-03-16 12:59:41
  from "C:\xampp\htdocs\Sociproma\smarty\templates\Pacientes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca7e2d643734_51976514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c990564e80972d0b452194bc7f36d22a279009a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\Pacientes.tpl',
      1 => 1489663615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58ca7e2d643734_51976514 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 language="JavaScript" src="js/calendar_eu.js"><?php echo '</script'; ?>
> 

<?php echo '<script'; ?>
 language="javascript">
function runMode( accion, Id ){
  forma = document.getElementById('fpaciente');

  forma.accion.value = accion;
  forma.action = "CtrlPaciente.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && accion != "buscar" && accion != "volver" ){
    if (validate_fpaciente(forma)){ forma.submit() };
  }
  else{
     if (accion == "volver"){
       forma.action = forma.referente.value;
     }
    forma.submit();
  }
}

function validate_fpaciente (form) {
  var alertstr = '';
  var invalid  = 0;

// shistoria: standard text, hidden, password, or textarea box
  var shistoria = form.elements['shistoria'].value;
  if (shistoria == null || shistoria == "" ) {
    alertstr += '- Indique un valor válido para el campo "Historia"\n';
    invalid++;
  }

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

<FORM METHOD="post" name="fpaciente" id="fpaciente" ACTION="CtrlPaciente.php">
<fieldset style="background-color : #e3e3e3">
<legend>Datos Pacientes</legend>
<table width="100%">
  <tr>
    <td width="15%"><b>Historia:</b></td>
    <td align="left"><input type="text" name="shistoria" id="shistoria" size="10" value="<?php echo $_smarty_tpl->tpl_vars['shistoria']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Apellido:</b></td>
    <td><input type="text" name="sapellido" id="sapellido" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sapellido']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td width="15%"><b>Nombre:</b></td>
    <td align="left"><input type="text" name="snombre" id="snombre" size="30" value="<?php echo $_smarty_tpl->tpl_vars['snombre']->value;?>
"><b>*</b></td>
  </tr>
  <tr>
    <td width="15%"><b>Edad:</b></td>
    <td align="left"><input type="text" name="edad" id="edad" size="3" value="<?php echo $_smarty_tpl->tpl_vars['edad']->value;?>
"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" onClick=" runMode('buscar','');"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="reset" id="btnCancelar" value="Cancelar">
      <input type="button" id="btnEnviar" onClick=" runMode('enviar', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');" value="Enviar">
      <?php if ($_smarty_tpl->tpl_vars['referente']->value != '') {?>
        <input type="button" id="btnVolver" onClick=" runMode('volver', '');" value="Volver">
      <?php }?>
     </td>
  </tr>
</table>
</fieldset>
<br/><br/>
<table width="75%" cellpadding="1" align="center">
  <tr class="titulodonforojo">
     <th>Historia</th>
     <th>Nombre</th>
     <th>Apellido</th>
     <th>Edad</th>
     <th></th>
     <th></th>
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrPacientes']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
    <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
      <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['shistoria'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['snombre'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['sapellido'];?>
</td>
      <td align="center"><?php echo $_smarty_tpl->tpl_vars['field']->value['edad'];?>
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
<input type="hidden" name="referente" id="referente" value="<?php echo $_smarty_tpl->tpl_vars['referente']->value;?>
">
<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
</FORM>
<?php }
}
