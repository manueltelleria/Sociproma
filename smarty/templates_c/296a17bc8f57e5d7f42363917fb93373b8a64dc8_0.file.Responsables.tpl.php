<?php
/* Smarty version 3.1.30, created on 2017-03-09 14:14:37
  from "C:\xampp\htdocs\Sociproma\smarty\templates\Responsables.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c1553da755a8_54237297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '296a17bc8f57e5d7f42363917fb93373b8a64dc8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\Responsables.tpl',
      1 => 1489059558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
  ),
),false)) {
function content_58c1553da755a8_54237297 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 language="JavaScript" src="js/calendar_eu.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 language="javascript">
function runMode( accion, Id ){
  forma = document.getElementById('fresponsable');

  forma.accion.value = accion;
  forma.action = "CtrlResponsable.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && accion != "buscar" && accion != "volver" ){
    if (validate_fresponsable(forma)){ forma.submit() };
  }
  else{
     if (accion == "volver"){
       forma.action = forma.referente.value;
     }
    forma.submit();
  }
  
}

function validate_fresponsable (form) {
  var alertstr = '';
  var invalid  = 0;

// snombre: standard text, hidden, password, or textarea box
  var sdescripcion = form.elements['sdescripcion'].value;
  if (sdescripcion == null || sdescripcion == "" ) {
    alertstr += '- Indique un valor válido para el campo "Descripci&oacute;n"\n';
    invalid++;
  }

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

<FORM METHOD="post" name="fresponsable" id="fresponsable" ACTION="CtrlResponsable.php">
<fieldset style="background-color : #e3e3e3">
<legend>Datos Responsables</legend>
<table width="100%">
  <tr>
    <td width="15%"><b>Descripci&oacute;n:</b></td>
    <td align="left"><input type="text" name="sdescripcion" id="sdescripcion" size="60" value="<?php echo $_smarty_tpl->tpl_vars['sdescripcion']->value;?>
"><b>*</b></td>
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
     <th>Num. Registro</th>
     <th>Descripci&oacute;n</th>
     <th></th>
     <th></th>
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrResponsables']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
    <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['field']->value['sdescripcion'];?>
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
<input type="hidden" name="id" id="id">
</FORM>
<?php }
}
