{include file="doctype.tpl"}
<link rel="stylesheet" href="menu/menu.css">
<LINK HREF="css/anestesia.css" REL="stylesheet" TYPE="text/css"
<!-- INICIO HEADER VENEZUELA -->
<head>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="/imagenes/soci.png" alt="soci.png" /></td>
    <td colspan="2" width="100%" align="right" class="titulosistema" background="/imagenes/banner_bandes_cen.jpg">Sistema Control de Intervenciones<br/></td>
  </tr>
  <tr>
    <td colspan="3" align="right">{$nombre_log}&nbsp;{$smarty.now|date_format:"%d/%m/%Y %H:%M:%S"}</td>
  </tr>
</table>

<link rel="stylesheet" type="text/css" href="css/jquerycssmenu.css" />
{literal}
<link href="menu/estilos.css" rel="stylesheet" type="text/css" /> 
<link href="menu/ADxMenuHoriz.css" rel="stylesheet" type="text/css" media="screen, tv, projection" /> 
<!--[if lte IE 6]>
<link href="ADxMenuHoriz-IE6.css" rel="stylesheet" type="text/css" media="screen, tv, projection" />
<![endif]--> 
 
<script type="text/javascript" src="menu/ADxMenu.js"></script> 

{/literal}

</head>
<!-- FIN HEADER VENEZUELA -->
<!-- INICIO MENU -->
{if $usuario_log}
<div class="ejemplo"> 
<ul class="adxm menu"> 
  {if $badministra}
    <li><a href="javascript:void();" title="Administración del Sistema">Administración</a>
      <ul> 
        <li><a href="http://localhost/CtrlUsuario.php" title="Registro de Usuarios">Usuarios</a></li> 
        <li><a href="http://localhost/CtrlDoctor.php" title="Registro de Doctores">Doctores</a></li> 
        <li><a href="http://localhost/CtrlPaciente.php" title="Registro de Pacientes">Pacientes</a></li> 
        <li><a href="http://localhost/CtrlResponsable.php" title="Registro de Responsables">Responsables</a></li> 
        <li><a href="http://localhost/CtrlIntervencion.php" title="Registro de Tipo de Intervenciones">Tipo de Intervenciones</a></li> 
      </ul> 
    </li> 
  {/if}
  <li><a href="javascript:void()" title="Recibos">Recibos</a>
    <ul> 
      <li><div><a href="http://localhost/CtrlPacienteIntervencion.php" title="Cargar Recibo" >Cargar Recibo</a></div></li> 
      <li><div><a href="http://localhost/CtrlPagarRecibo.php" title="Pagar Recibo" >Pagar Recibo</a></div></li> 
    </ul> 
  </li> 
  <li><a href="javascript:void();" title="Consultas del Sistema">Consultas</a>
    <ul> 
      <li><div><a href="http://localhost/CtrlBuscarRecibo.php" title="Consulta de Recibos" >Consulta Recibos</a></div></li> 
    </ul> 
  </li> 
  <li><a href="http://localhost/Salir.php" title="Salir del Sistema">Salir</a></li> 
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
<script type="text/javascript" src="/js/tooltip.js"></script>
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
               <img alt="Cargando" src="/imagenes/cargando.gif" /> 
            </td> 
         </tr>  
      </table> 
</div>
