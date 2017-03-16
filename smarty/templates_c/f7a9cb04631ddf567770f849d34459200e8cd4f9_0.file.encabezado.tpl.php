<?php
/* Smarty version 3.1.30, created on 2017-03-16 17:45:47
  from "/opt/lampp/htdocs/Sociproma_linux/smarty/templates/encabezado.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cac13b1b78b8_73184095',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7a9cb04631ddf567770f849d34459200e8cd4f9' => 
    array (
      0 => '/opt/lampp/htdocs/Sociproma_linux/smarty/templates/encabezado.tpl',
      1 => 1489682744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cac13b1b78b8_73184095 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/opt/lampp/htdocs/sociproma/libs/plugins/modifier.date_format.php';
?>
<html>
<!-- INICIO HEADER VENEZUELA -->
<head>
<link rel="stylesheet" href="/Sociproma_linux/menu/menu.css">
<LINK HREF="/Sociproma_linux/css/anestesia.css" REL="stylesheet" TYPE="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="/Sociproma_linux/css/jquerycssmenu.css" />

<link href="/Sociproma_linux/menu/estilos.css" rel="stylesheet" type="text/css" /> 
<link href="/Sociproma_linux/menu/ADxMenuHoriz.css" rel="stylesheet" type="text/css" media="screen, tv, projection" /> 
<!--[if lte IE 6]>
<link href="ADxMenuHoriz-IE6.css" rel="stylesheet" type="text/css" media="screen, tv, projection" />
<![endif]--> 
 
<?php echo '<script'; ?>
 type="text/javascript" src="/Sociproma_linux/menu/ADxMenu.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 language="JavaScript" src="js/generales.js"><?php echo '</script'; ?>
> 



</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="/Sociproma_linux/imagenes/soci.png" alt="soci.png" /></td>
    <td colspan="2" width="100%" align="right" class="titulosistema" background="/Sociproma_linux/imagenes/banner_bandes_cen.jpg">Sistema Control de Intervenciones<br/></td>
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
        <li><a href="http://localhost/Sociproma_linux/CtrlUsuario.php" title="Registro de Usuarios">Usuarios</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlDoctor.php" title="Registro de Doctores">Doctores</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlPaciente.php" title="Registro de Pacientes">Pacientes</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlResponsable.php" title="Registro de Responsables">Responsables</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlIntervencion.php" title="Registro de Tipo de Intervenciones">Tipo de Intervenciones</a></li> 
      </ul> 
    </li> 
  <?php }?>
  <li><a href="javascript:void()" title="Recibos">Recibos</a>
    <ul> 
      <li><div><a href="http://localhost/Sociproma_linux/CtrlPacienteIntervencion.php" title="Cargar Recibo" >Cargar Recibo</a></div></li> 
    </ul> 
  </li> 
  <li><a href="javascript:void();" title="Consultas del Sistema">Consultas</a>
    <ul> 
      <li><div><a href="http://localhost/Sociproma_linux/CtrlBuscarRecibo.php" title="Consulta de Recibos" >Consulta Recibos</a></div></li> 
    </ul> 
  </li> 
  <li><a href="http://localhost/Sociproma_linux/Salir.php" title="Salir del Sistema">Salir</a></li> 
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
 type="text/javascript" src="/Sociproma_linux/js/tooltip.js"><?php echo '</script'; ?>
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
               <img alt="Cargando" src="/Sociproma_linux/imagenes/cargando.gif" /> 
            </td> 
         </tr>  
      </table> 
</div>
<?php }
}
