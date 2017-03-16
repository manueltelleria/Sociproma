<html>
<!-- INICIO HEADER VENEZUELA -->
<head>
<link rel="stylesheet" href="/Sociproma_linux/menu/menu.css">
<LINK HREF="/Sociproma_linux/css/anestesia.css" REL="stylesheet" TYPE="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="/Sociproma_linux/css/jquerycssmenu.css" />
{literal}
<link href="/Sociproma_linux/menu/estilos.css" rel="stylesheet" type="text/css" /> 
<link href="/Sociproma_linux/menu/ADxMenuHoriz.css" rel="stylesheet" type="text/css" media="screen, tv, projection" /> 
<!--[if lte IE 6]>
<link href="ADxMenuHoriz-IE6.css" rel="stylesheet" type="text/css" media="screen, tv, projection" />
<![endif]--> 
 
<script type="text/javascript" src="/Sociproma_linux/menu/ADxMenu.js"></script> 
<script language="JavaScript" src="js/generales.js"></script> 

{/literal}

</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="/Sociproma_linux/imagenes/soci.png" alt="soci.png" /></td>
    <td colspan="2" width="100%" align="right" class="titulosistema" background="/Sociproma_linux/imagenes/banner_bandes_cen.jpg">Sistema Control de Intervenciones<br/></td>
  </tr>
  <tr>
    <td colspan="3" align="right">{$nombre_log}&nbsp;{$smarty.now|date_format:"%d/%m/%Y %H:%M:%S"}</td>
  </tr>
</table>
<!-- FIN HEADER VENEZUELA -->
<!-- INICIO MENU -->
{if $usuario_log}
<div class="ejemplo"> 
<ul class="adxm menu"> 
  {if $badministra}
    <li><a href="javascript:void();" title="Administración del Sistema">Administración</a>
      <ul> 
        <li><a href="http://localhost/Sociproma_linux/CtrlUsuario.php" title="Registro de Usuarios">Usuarios</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlDoctor.php" title="Registro de Doctores">Doctores</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlPaciente.php" title="Registro de Pacientes">Pacientes</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlResponsable.php" title="Registro de Responsables">Responsables</a></li> 
        <li><a href="http://localhost/Sociproma_linux/CtrlIntervencion.php" title="Registro de Tipo de Intervenciones">Tipo de Intervenciones</a></li> 
      </ul> 
    </li> 
  {/if}
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

{/if}

<!-- FIN MENU -->
<br/>
{if $subtitulo }
<div class="titulonegro" align="center">{$subtitulo }</div>
{/if}
<div align="center">
<span class="titulodonfomarillo" id="error_msg">{$error_msg}</span>
</div>
{literal}
<script type="text/javascript" language="Javascript">
//ocultar mensajes de error luego de 10 segundos
if (document.getElementById) {
  if (document.getElementById('error_msg')) {
    window.setTimeout("document.getElementById('error_msg').style.display = 'none'",6000);
  }
}
</script>
<script type="text/javascript" src="/Sociproma_linux/js/tooltip.js"></script>
{/literal}
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
