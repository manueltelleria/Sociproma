{include file='encabezado.tpl'}
{literal}
<script language="JavaScript" src="js/calendar_eu.js"></script> 
<script type="text/javascript" src="js/prototype/prototype.js"></script>
<script type="text/javascript" src="js/seleccionarItemList.js"></script>
<script>

cont_fila=0; 
Arraymontos = new Array();

</script>

<script language="javascript">

//Función cargarCaomboPaciente: se encarga de cargar el contenido de las listas Paciente depediendo del criterio de busqueda en el campo criterio
function cargarCombo( listaLlenar ){
  var forma = document.fpaciente_intervencion;
  var url = '/sociproma/CtrlPacienteIntervencion.php';
  campo = eval('forma.'+listaLlenar);
  if ( listaLlenar == 'id_paciente' ){
    var funcion = eval('llenar_id_paciente');
    var accion = 'buscarPacientes';
  }
  else{
    var funcion = eval('llenar_'+listaLlenar);
    var accion = 'buscarIntervenciones';
  }
  var valorCriterio = forma.criterio.value;

  if (valorCriterio) {
    if (valorCriterio.length > 3){
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
  var forma = document.fpaciente_intervencion;
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
  forma = document.getElementById('fpaciente_intervencion');

  forma.accion.value = accion;
  forma.action = "CtrlPacienteIntervencion.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && 
      accion != "buscar" && accion != "crear_paciente" && 
      accion != "crear_responsable" && accion != "volver" &&
      accion != "pagar_recibo" ){
{/literal}
    {if $bpagar == 1}
      if (validate_fpacienteInterven_existe(forma)){ forma.submit() };
    {else}
      {if $bcompleto == 1}
        {literal}
          if (validate_fpacienteInterven_completo(forma)){ forma.submit() };
        {/literal}
      {else}
        {literal}
          if (validate_fpacienteInterven_existe(forma)){ forma.submit() };
        {/literal}
      {/if}
    {/if}      
{literal}
  } else if( accion == "crear_paciente"){
    forma.action = "CtrlPaciente.php";
    forma.submit();
  } else if( accion == "crear_responsable"){
    forma.action = "CtrlResponsable.php";
    forma.submit();
  } else if( accion == "pagar_recibo"){
    if (validate_fpacienteInterven_pago(forma)){
      forma.action = "CtrlPacienteIntervencion.php";
      forma.submit();
    }
  }else if( accion == "volver"){
    forma.submit();
  }
  else{
    forma.submit();
  }
}
{/literal}

{if $bpagar == 1}
  {include file='js/validate_fpacienteInterven_pago.js'}
{else}
  {if $bcompleto == 1}
    {include file='js/validate_fpacienteInterven_completo.js'}
  {else}
    {include file='js/validate_fpacienteInterven_existe.js'}
  {/if}
{/if}


{literal}
function calcula_monto( ){
  var value_sap       = document.fpaciente_intervencion.monto_sap.value;
  var value_preva     = document.fpaciente_intervencion.monto_preva.value;
  var value_anestesia = document.fpaciente_intervencion.monto_anestesia.value;

  if (value_sap.indexOf(",") != -1 ){
    value_sap = value_sap.replace(".",'');
    value_sap = value_sap.replace(",",'.');
  }
  if (value_preva.indexOf(",") != -1 ){
    value_preva = value_preva.replace(".",'');
    value_preva = value_preva.replace(",",'.');
  }
  if (value_anestesia.indexOf(",") != -1 ){
    value_anestesia = value_anestesia.replace(".",'');
    value_anestesia = value_anestesia.replace(",",'.');
  }
  var monto_sap       = parseFloat(value_sap).toFixed(2);
  var monto_preva     = parseFloat(value_preva).toFixed(2);
  var monto_anestesia = parseFloat(value_anestesia).toFixed(2);
  var monto_total;

  monto_total = parseFloat(monto_sap) + parseFloat(monto_preva) + parseFloat(monto_anestesia);

  if (value_sap.indexOf(",") == -1){
   document.fpaciente_intervencion.monto_sap.value = formatearMoneda(value_sap);
  }
  if (value_preva.indexOf(",") == -1){
    document.fpaciente_intervencion.monto_preva.value = formatearMoneda(value_preva);
  }
  if (value_anestesia.indexOf(",") == -1){
    document.fpaciente_intervencion.monto_anestesia.value = formatearMoneda(value_anestesia);
  }
  document.fpaciente_intervencion.monto_total.value = formatearMoneda(monto_total);
                                                      
}
</script>
{/literal}

<LINK HREF="css/anestesia.css" REL="stylesheet" TYPE="text/css">
<link rel="stylesheet" href="calendar.css"> 
<table width="100%">
<tr>
<td class="tituloforma" align="center">{$titulo}</td>
</tr>
</table>

<FORM METHOD="post" name="fpaciente_intervencion" id="fpaciente_intervencion" ACTION="CtrlPaciente_Intervencion.php">
{if $bpagar != 1}
  <fieldset style="background-color : #e3e3e3">
  <legend>Datos Intervención por Paciente</legend>
  {if $bcompleto == 1}
    <table width="100%">
      <tr>
        <td width="15%"><b>Historia:</b></td>
        <td align="left"><input type="text" name="shistoria" id="shistoria" size="10" value="{$shistoria}"><b>*</b></td>
      </tr>
      <tr>
        <td><b>Apellidos:</b></td>
        <td><input type="text" name="sapellido" id="sapellido" size="30" value="{$sapellido}"><b>*</b></td>
      </tr>
      <tr>
        <td width="15%"><b>Nombres:</b></td>
        <td align="left"><input type="text" name="snombre" id="snombre" size="30" value="{$snombre}"><b>*</b></td>
      </tr>
      <tr>
        <td width="15%"><b>Edad:</b></td>
        <td align="left"><input type="text" name="edad" id="edad" size="3" value="{$edad}"></td>
      </tr>
    </table>  
  {/if}
  <table width="100%" border=0>
    <tr>
      <td width="15%"><b>Número de Recibo:</b></td>
      <td align="left"><input type="text" name="num_recibo" id="num_recibo" size="10" value="{$num_recibo}"><b>*</b></td>
    </tr>
    {if $id_paciente != ''}
      <tr>
        <td width="15%"><b>Paciente:</b></td>
        <td align="left"><b>{$nombre_paciente}</b><input name="id_paciente" id="id_paciente" type="hidden" value="{$id_paciente}"></td>
      </tr>
    {else}
      {if $bcompleto != 1}    
        <tr>
          <td width="15%"><b>Paciente:</b></td>
          <td align="left"><input type="text" name="criterio" id="criterio" size="15" onKeyup="cargarCombo('id_paciente');">&nbsp;
            <select name="id_paciente" id="id_paciente">
              {html_options options=$pacien_options selected=$id_paciente}
            </select><b>*</b><!--&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_paciente' ); ">Paciente Nuevo</a>-->
          </td>
        </tr>
      {/if}  
    {/if}
    <tr>
      <td width="15%"><b>Fecha de la Intervención:</b></td>
      <td>
        <INPUT TYPE="text" NAME="fecha" id="fecha" SIZE="10" value="{$fecha}">
  {literal}
        <script language="JavaScript"> 
    new tcal ({
      // form name
      'formname': 'fpaciente_intervencion',
      // input name
      'controlname': 'fecha'
    });
         </script>
  {/literal}
         <b>*</b>
      </td>
    <tr>
      <td><b>Tipo de Operación:</b></td>
       <td align="left">
        <select name="id_tpoperacion" id="id_tpoperacion">
          {html_options options=$tpopera_options selected=$id_tpoperacion}
        </select><b>*</b>
      </td>
    </tr>
    <tr>
      <td><b>Cirujano:</b></td>
      <td>
        <select name="id_doctor_cirujano" id="id_doctor_cirujano">
          {html_options options=$doctorCiru_options selected=$id_doctor_cirujano}
        </select><b>*</b>  
      </td>
    </tr>
    <tr>
      <td><b>Anestesiólogo:</b></td>
      <td>
        <select name="id_doctor_anestesia" id="id_doctor_anestesia">
          {html_options options=$doctorAnes_options selected=$id_doctor_anestesia}
        </select><b>*</b>  
      </td>
    </tr>
    <tr>
      <td><b>Monto SAP:</b></td>
      <td><input type="text" name="monto_sap" id="monto_sap" size="17" value="{$monto_sap}" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Pre-Anestesia:</b></td>
      <td><input type="text" name="monto_preva" id="monto_preva" size="17" value="{$monto_preva}" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Anestesia:</b></td>
      <td><input type="text" name="monto_anestesia" id="monto_anestesia" size="17" value="{$monto_anestesia}" onchange="calcula_monto()"></td>
    </tr>
    <tr>
      <td><b>Monto Total:</b></td>
      <td><input type="text" name="monto_total" id="monto_total" size="17" value="{$monto_total}" onchange=" this.value=formatearMoneda(this.value)"><b>*</b></td>
    </tr>
    <tr>
      <td><b>Tipo Intervención:</b></td>
      <td>
        <select name="id_intervencion" id="id_intervencion">
          {html_options options=$interven_options selected=$id_intervencion}
        </select><b>*</b>
      </td>
    </tr>
    <tr>
      <td><b>Responsable:</b></td>
      <td>
        <select name="id_responsable" id="id_responsable">
          {html_options options=$respon_options selected=$id_responsable}
        </select><!--&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_responsable' ); ">Responsable Nuevo</a>-->
      </td>
    </tr>
    <tr>
      <td><b>Observación:</b></td>
      <td><input type="text" name="sobservacion" id="sobservacion" size="60" value="{$sobservacion}"></td>
    </tr>
    <tr>
      <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
    </tr>
  </table>
  </fieldset>
{else}
  <fieldset style="background-color : #e3e3e3">
  <legend>Datos del Pago del Recibo</legend>
  <table width="100%" border=0>
    <tr>
      <td width="15%"><b>Número de Recibo:</b></td>
      <td align="left"><b>{$num_recibo}</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Paciente:</b></td>
      <td align="left"><b>{$nombre_paciente}</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Cirujano:</b></td>
      <td align="left"><b>{$nombre_cirujano}</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Nombre Anestesiólogo:</b></td>
      <td align="left"><b>{$nombre_anestesiologo}</b></td>       
    </tr>
    <tr>
      <td width="15%"><b>Monto Pagado:</b></td>
      <td align="left">
        <input type="text" name="monto_pagado" id="monto_pagado" size="15" value="0" onchange="this.value = formatearMoneda(this.value)">
      </td>       
    </tr>
    <tr>
      <td width="15%"><b>Fecha de Pago:</b></td>
    <td>
      <INPUT TYPE="text" NAME="fecha_pago" id="fecha_pago" SIZE="10">
{literal}
      <script language="JavaScript"> 
  new tcal ({
    // form name
    'formname': 'fpaciente_intervencion',
    // input name
    'controlname': 'fecha_pago'
  });
       </script>
{/literal}
       <b>*</b>
    </td>
    </tr>
    
  </table>
  </fieldset>
{/if}  
<br/><br/>
<table width="75%" cellpadding="1" align="center" id="tabla">
    <tr>
      <td align="center">
        <input type="reset" id="btnCancelar" value="Cancelar">
        {if $bpagar != 1}
          <input type="button" id="btnEnviar" onClick=" runMode('enviar', '{$id}');" value="Enviar">
        {else}
          <input type="button" id="btnEnviar" onClick=" runMode('pagar_recibo', '{$id}');" value="Enviar">
        {/if}
        {if $bvolver == 1}
          <input type="button" id="btnVolver" onClick=" runMode('volver');" value="Volver">
        {/if}
      </td>
    </tr>
</table>
<input type="hidden" name="accion" id="accion">
<input type="hidden" name="id" id="id" value="{$id}">
<input type="hidden" name="bcompleto" id="bcompleto" value="{$bcompleto}">

</FORM>

</body>
</html>
