<?php
/* Smarty version 3.1.30, created on 2017-03-09 00:12:42
  from "/opt/lampp/htdocs/smarty/templates/RecibosPdf.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c08fea0a8990_72271254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09fb00b308a56f2f07a3cf01c1ac2a60bc45a335' => 
    array (
      0 => '/opt/lampp/htdocs/smarty/templates/RecibosPdf.tpl',
      1 => 1489012982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c08fea0a8990_72271254 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/opt/lampp/htdocs/sociproma/libs/plugins/modifier.date_format.php';
?>
<page backtop="38mm" backbottom="15mm" pageset="new" >
<LINK HREF="css/anestesia.css" REL="stylesheet" TYPE="text/css">
<page_header>
<TABLE style="border-spacing:0px; border-collapse:0px; border:0px solid; bordercolor:#cc3300; width=750px;" celspacing="0" celpaddign="1" border="0">
<TR>
<TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-weight:bold;color:black; width=300px;" bgcolor="white">
<IMG src="imagenes/soci.png" width="150" height="80" align="left" border="0">
</TD>
</TR>
</table>
<TABLE width="100%" align="center" celspacing="0" celpaddign="1" border="0">
  <tr>
    <td width="100%" align="center"><b><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</b></td>
  </tr>
</table>
<TABLE width="100%" align="right" celspacing="0" celpaddign="1" border="0">
  <tr>
    <td width="100%" align="right"><?php echo smarty_modifier_date_format(time(),"%d/%m/%Y %H:%M:%S");?>
</td>
  </tr>
</table>
</page_header>
<page_footer>
<table style="width: 100%;">
<tr>
<td align="left" style="text-align: left;width: 70%;"></td>
<td align="right" style="text-align: right;width: 30%;">Pagina [[page_cu]]/[[page_nb]]</td>
</tr>
</table>
</page_footer>
<table align="center" width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr class="titulodonforojo">
     <th width="7%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Recibo</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Fecha</th>
     <th width="13%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Paciente</th>
     <th width="5%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Tipo</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Cirujano</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Anestesiologo</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Monto</th>
     <th width="15%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Responsable</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Fecha Pago</th>
     <th width="10%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; text-decoration:none;height:11px; width:100px;">Estatus</th>
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ArrRecibos']->value, 'field', false, 'Id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Id']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
    <tr class=<?php echo $_smarty_tpl->tpl_vars['field']->value['clase'];?>
>
     <TD width="7%" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px;"><?php echo $_smarty_tpl->tpl_vars['field']->value['num_recibo'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['fecha'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:left; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_paciente'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['desctpopera'];?>
</td>
     <TD align="left" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:left; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_cirujano'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:left; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_anestesia'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:right; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['monto_total'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:left; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['nombre_respon'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px; "><?php echo $_smarty_tpl->tpl_vars['field']->value['fecha_pago'];?>
</td>
     <TD style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px;"><?php echo $_smarty_tpl->tpl_vars['field']->value['descestatus'];?>
</td>
    </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  <tr>
    <TD colspan="6" align="right" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px; "><b>TOTAL MONTO: </b></td>
    <TD align="left" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:center; font-weight:none; color:black;text-decoration:none;height:11px; "><b><?php echo $_smarty_tpl->tpl_vars['TotalMonto']->value;?>
</b></td>
  </tr>
</table>
<table align="left" width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <TD align="left" style="font-family:Arial,Verdana,Bitstream Vera Sans,Sans,Sans-serif;font-size:10px;text-align:left; font-weight:none; color:black;text-decoration:none;height:11px; "><b>TOTAL RECIBOS: <?php echo $_smarty_tpl->tpl_vars['TotalReg']->value;?>
</b></td>
  </tr>
</table>
</page>
<?php }
}
