<?php
/* Smarty version 3.1.30, created on 2017-03-16 12:42:20
  from "C:\xampp\htdocs\Sociproma\smarty\templates\encabezado.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca7a1c50ef89_20932348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63fe20a63bfdf9d313f2e585ba427b34510840e3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Sociproma\\smarty\\templates\\encabezado.tpl',
      1 => 1489664534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca7a1c50ef89_20932348 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\Sociproma\\libs\\plugins\\modifier.date_format.php';
?>
<html>
<!-- INICIO HEADER VENEZUELA -->
<head>
<link rel="stylesheet" href="/sociproma/menu/menu.css">
<LINK HREF="/sociproma/css/anestesia.css" REL="stylesheet" TYPE="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="/sociproma/css/jquerycssmenu.css" />

<link href="/sociproma/menu/estilos.css" rel="stylesheet" type="text/css" /> 
<link href="/sociproma/menu/ADxMenuHoriz.css" rel="stylesheet" type="text/css" media="screen, tv, projection" /> 
<!--[if lte IE 6]>
<link href="ADxMenuHoriz-IE6.css" rel="stylesheet" type="text/css" media="screen, tv, projection" />
<![endif]--> 
 
<?php echo '<script'; ?>
 type="text/javascript" src="/sociproma/menu/ADxMenu.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 language="JavaScript" src="js/generales.js"><?php echo '</script'; ?>
> 



</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="/sociproma/imagenes/soci.png" alt="soci.png" /></td>
    <td colspan="2" width="100%" align="right" class="titulosistema" background="/sociproma/imagenes/banner_bandes_cen.jpg">Sistema Control de Intervenciones<br/></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><?php echo $_smarty_tpl->tpl_vars['nombre_log']->value;?>
&nbsp;<?php echo smarty_modifier_date_format(time(),"%d/%m/%Y %H:%M:%S");?>
</td>
  </tr>
</table>
<!-- FIN HEADER VENEZUELA -->
<!-- INICIO MENU -->
<?php if ($_smarty_tpl->tpl_vars['usuario_log']->value) {?>
<div class="ejemplo"> 
<ul class="adxm menu"> 
  <?php if ($_smarty_tpl->tpl_vars['badministra']->value) {?>
    <li><a href="javascript:void();" title="Administración del Sistema">Administración</a>
      <ul> 
        <li><a href="http://localhost:8080/sociproma/CtrlUsuario.php" title="Registro de Usuarios">Usuarios</a></li> 
        <li><a href="http://localhost:8080/sociproma/CtrlDoctor.php" title="Registro de Doctores">Doctores</a></li> 
        <li><a href="http://localhost:8080/sociproma/CtrlPaciente.php" title="Registro de Pacientes">Pacientes</a></li> 
        <li><a href="http://localhost:8080/sociproma/CtrlResponsable.php" title="Registro de Responsables">Responsables</a></li> 
        <li><a href="http://localhost:8080/sociproma/CtrlIntervencion.php" title="Registro de Tipo de Intervenciones">Tipo de Intervenciones</a></li> 
      </ul> 
    </li> 
  <?php }?>
  <li><a href="javascript:void()" title="Recibos">Recibos</a>
    <ul> 
      <li><div><a href="http://localhost:8080/sociproma/CtrlPacienteIntervencion.php" title="Cargar Recibo" >Cargar Recibo</a></div></li> 
    </ul> 
  </li> 
  <li><a href="javascript:void();" title="Consultas del Sistema">Consultas</a>
    <ul> 
      <li><div><a href="http://localhost:8080/sociproma/CtrlBuscarRecibo.php" title="Consulta de Recibos" >Consulta Recibos</a></div></li> 
    </ul> 
  </li> 
  <li><a href="http://localhost:8080/sociproma/Salir.php" title="Salir del Sistema">Salir</a></li> 
</ul> 
</div>  

<?php }?>

<!-- FIN MENU -->
<br/>
<?php if ($_smarty_tpl->tpl_vars['subtitulo']->value) {?>
<div class="titulonegro" align="center"><?php echo $_smarty_tpl->tpl_vars['subtitulo']->value;?>
</div>
<?php }?>
<div align="center">
<span class="titulodonfomarillo" id="error_msg"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</span>
</div>

<?php echo '<script'; ?>
 type="text/javascript" language="Javascript">
//ocultar mensajes de error luego de 10 segundos
if (document.getElementById) {
  if (document.getElementById('error_msg')) {
    window.setTimeout("document.getElementById('error_msg').style.display = 'none'",6000);
  }
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/sociproma/js/tooltip.js"><?php echo '</script'; ?>
>

<div id="cargando" style="display: none">
      <table> 
         <tr> 
            <td> 
               <span style="color: #000000">Cargando</span>
            </td> 
         </tr>
         <tr> 
            <td align="center">
               <img alt="Cargando" src="/sociproma/imagenes/cargando.gif" /> 
            </td> 
         </tr>  
      </table> 
</div>
<?php }
}
