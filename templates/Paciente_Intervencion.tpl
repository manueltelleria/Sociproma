{include file='encabezado.tpl'}
{literal}
<script language="JavaScript" src="js/calendar_eu.js"></script> 
<script type="text/javascript" src="js/prototype/prototype.js"></script>
<script type="text/javascript" src="js/seleccionarItemList.js"></script>
<script>

cont_fila=0; 
Arraymontos = new Array();

function agregarFila( ){ 
  var forma = document.fpaciente_intervencion;

  var campo = cont_fila + 1;
  if ( document.getElementById("numFila")){
    cont_fila++;
  }
  idtabla="tabla"; 
  contenido = new Array(); 
  var nombre_0 = "criterio_"+campo;
  var nombre_1 = "id_intervencion_"+campo;
  var nombre_2 = "sobservacion_"+campo;
  contenido[0] = '<td><input type="text" name="'+nombre_0+'" size="5" id="'+nombre_0+'" onkeyup=" cargarCombo(\''+nombre_1+'\');">';
  contenido[1] = '<td><select name="'+nombre_1+'" id="'+nombre_1+'"></select></td>';
  contenido[2] = '<td><input type="text" name="'+nombre_2+'" size="50" value=""></td>';    
  contenido[3] = '<td align="center" valign="center"><a href="#" <input type="button" onClick="eliminaFila('+cont_fila+');"><img src="imagenes/b_drop.png"></a></td>';
  if ( campo <= 4){
    agregarcont_fila(idtabla,contenido); 
    cont_fila++; 
  }
} 

function eliminaFila(fila){
  var objHijo = document.getElementById('trDetalle_' + fila);
  var objPadre = objHijo.parentNode;
  objPadre.removeChild(objHijo);

//  var monto_total = 0;
//Se actualiza el monto total
//  for (var i= 0; i <= 4; i++){
//    var Monto = document.getElementById('id_intervencion_'+i);
//    if ( Monto ){
//      if (Monto.value){
//        monto_total = parseFloat(Monto.value);
//      }
//    }
//  }

//  document.fpaciente_intervencion.monto_total.value = monto_total;

  cont_fila = fila;
}

function agregarcont_fila(idTabla,arrayContenido){ 
  var tr = document.createElement("tr"); //crear objeto <TR> 
  tr.id = "trDetalle_" + cont_fila;
  for (i=0; i < arrayContenido.length; i++){ 
    var td = document.createElement("td"); //crear objeto <TD> 
    td.innerHTML = arrayContenido[i];       //agregamos HTML al interior de <TD>    
    tr.appendChild(td); 
  } 
  obj1 = document.getElementById(idTabla); 
  obj1.lastChild.appendChild(tr); 
} 
</script>

<script language="javascript">

//Funci�n cargarCaomboPaciente: se encarga de cargar el contenido de las listas Paciente depediendo del criterio de busqueda en el campo criterio
function cargarCombo( listaLlenar ){
  var forma = document.fpaciente_intervencion;
  var url = '/CtrlPacienteIntervencion.php';
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
  if ( listaLlenar == "id_intervencion_0" ){
    valorCriterio = forma.criterio_0.value;
  }
  else if ( listaLlenar == "id_intervencion_1" ){
     valorCriterio = forma.criterio_1.value;
  }
  else if ( listaLlenar == "id_intervencion_2" ){
     valorCriterio = forma.criterio_2.value;
  }
  else if ( listaLlenar == "id_intervencion_3" ){
     valorCriterio = forma.criterio_3.value;
  }
  else if ( listaLlenar == "id_intervencion_4" ){
     valorCriterio = forma.criterio_4.value;
  }

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

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
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

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_0(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_0);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_0,new Option(elemento[1],elemento[0]));
//      Arraymontos[elemento[0]] = elemento[2];
    }
  }
}

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_1(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_1);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_1,new Option(elemento[1],elemento[0]));
    }
  }
}

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_2(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_2);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_2,new Option(elemento[1],elemento[0]));
    }
  }
}

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_3(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_3);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_3,new Option(elemento[1],elemento[0]));
    }
  }
}

//Funci�n llenar_id_paciente: M�todo encargado de hacer el llamado al m�todo llenarListaDependiente, indicando que la lista a llenar es la de los Pacientes.
function llenar_id_intervencion_4(originalRequest) {
  var respuesta = originalRequest.responseText;
  var forma = document.fpaciente_intervencion;
  vaciarLista(forma.id_intervencion_4);

  if ( respuesta != 'undef' ){
    var primerarreglo = respuesta.split("|");
    for(i=0;i<primerarreglo.length;i++){
      var elemento  = primerarreglo[i].split(":");
      agregarOpcionLista(forma.id_intervencion_4,new Option(elemento[1],elemento[0]));
    }
  }
}

function runMode( accion, Id ){
  forma = document.getElementById('fpaciente_intervencion');

  forma.accion.value = accion;
  forma.action = "CtrlPacienteIntervencion.php";
  forma.id.value = Id;

  if (accion != "elimina" && accion != "actualiza" && 
      accion != "buscar" && accion != "crear_paciente" && accion != "crear_responsable" && accion != "volver" ){
    if (validate_fpaciente_intervencion(forma)){ forma.submit() };
  } else if( accion == "crear_paciente"){
    forma.action = "CtrlPaciente.php";
    forma.submit();
  } else if( accion == "crear_responsable"){
    forma.action = "CtrlResponsable.php";
    forma.submit();
  }else if( accion == "pagar_recibo"){
    forma.action = "CtrlPacienteIntervencion.php";
    forma.submit();  
  }else if( accion == "volver"){
    forma.submit();
  }
  else{
    forma.submit();
  }
}

function validate_fpaciente_intervencion (form) {
  var alertstr = '';
  var invalid  = 0;

// numrecibo: standard text, hidden, password, or textarea box
  var num_recibo = form.elements['num_recibo'].value;
  if (num_recibo == null || num_recibo == "" ) {
    alertstr += '- Indique un valor v�lido para el campo "N�mero de Recibo"\n';
    invalid++;
  }
  else{
    if (!num_recibo.match(/^-?\s*[0-9]+$/)){
	  alertstr += '- Indique un valor v�lido para el campo "N�mero de Recibo"\n';
      invalid++;
	}
  }

// id_paciente: select list, always assume it's multiple to get all values
  var id_paciente = 0;
  var selected_id_paciente = 0;
  for (var loop = 0; loop < form.elements['id_paciente'].options.length; loop++) {
    if (form.elements['id_paciente'].options[loop].selected) {
      id_paciente = form.elements['id_paciente'].options[loop].value;
      selected_id_paciente++;
      if (id_paciente == 0 || id_paciente === 0) {
        alertstr += '- Seleccione una opci�n para el campo "Paciente"\n';
        invalid++;
      }
    } // if
  } // for id_paciente

// fecha: standard text, hidden, password, or textarea box
  var fecha = form.elements['fecha'].value;
  if (fecha == null || fecha == "" ) {
    alertstr += '- Indique un valor v�lido para el campo "Fecha"\n';
    invalid++;
  }
  else{
    if (!fecha.match(/^(0?[1-9]|[1-2][0-9]|3[0-1])\/?(0?[1-9]|1[0-2])\/?[0-9]{4}$/)){
      alertstr += '- Indique un valor v�lido para el campo "Fecha"\n';
      invalid++;
    }
  }

// id_doctor_cirujano: select list, always assume it's multiple to get all values
  var id_doctor_cirujano = 0;
  var selected_id_doctor_cirujano = 0;
  for (var loop = 0; loop < form.elements['id_doctor_cirujano'].options.length; loop++) {
    if (form.elements['id_doctor_cirujano'].options[loop].selected) {
      id_doctor_cirujano = form.elements['id_doctor_cirujano'].options[loop].value;
      selected_id_doctor_cirujano++;
      if (id_doctor_cirujano == 0 || id_doctor_cirujano === 0) {
        alertstr += '- Seleccione una opci�n para el campo "Cirujano"\n';
        invalid++;
      }
    } // if
  } // for id_doctor_cirujano

// id_doctor_anestesia: select list, always assume it's multiple to get all values
  var id_doctor_anestesia = 0;
  var selected_id_doctor_anestesia = 0;
  for (var loop = 0; loop < form.elements['id_doctor_anestesia'].options.length; loop++) {
    if (form.elements['id_doctor_anestesia'].options[loop].selected) {
      id_doctor_anestesia = form.elements['id_doctor_anestesia'].options[loop].value;
      selected_id_doctor_anestesia++;
      if (id_doctor_anestesia == 0 || id_doctor_anestesia === 0) {
        alertstr += '- Seleccione una opci�n para el campo "Anestesiologo"\n';
        invalid++;
      }
    } // if
  } // for id_doctor_anestesia

// monto_total: standard text, hidden, password, or textarea box
  var monto_total = form.elements['monto_total'].value;
  if (monto_total == null || monto_total == "" ) {
    alertstr += '- Indique un valor v�lido para el campo "Monto Total"\n';
    invalid++;
  }

  for (var i=0; i<=4; i++){
    var linea = i + 1;
    var Cuantos = 0;
    var SelInter = document.getElementById('id_intervencion_'+i);
    if (SelInter){
      var id_Inter = 0;
      var selected_id_interven = 0;
      if ( SelInter.options.length == 0){
        alertstr += '- Seleccione una opci�n para el campo "Intervencion" '+linea+'\n';
        invalid++;
      }
      else{
        for (var loop = 0; loop < SelInter.options.length; loop++) {
          if (SelInter.options[loop].selected) {
            id_Inter = SelInter.options[loop].value;
            selected_id_interven++;
            if (id_Inter == 0 || id_Inter === 0) {
              alertstr += '- Seleccione una opci�n para el campo "Intervencion" '+linea+'\n';
              invalid++;
            }
          } // if
        } // for id_intervencion
      } 
    } 
  }

  if (invalid > 0 || alertstr != '') {
    if (! invalid) invalid = 'Los Siguiemtes';   // catch for programmer error
    alert(''+invalid+' error(es) fueron encontrados al enviar la informaci�n:'+'\n\n'
    +alertstr+'\n'+'- Por favor corrija los campos y trate de nuevo');
    return false;
  }
  return true;  // all checked ok
}

function actMonto( campo, linea ){
  var monto = eval('document.fpaciente_intervencion.nmonto_'+linea);
  var MontoTotal = document.fpaciente_intervencion.monto_total.value || 0;
  for (var loop = 0; loop < campo.options.length; loop++) {
    if (campo.options[loop].selected) {
      monto.value = Arraymontos[campo.options[loop].value];      
      document.fpaciente_intervencion.monto_total.value = parseFloat(MontoTotal) + parseFloat(monto.value);
    }
  }
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
<fieldset style="background-color : #e3e3e3">
<legend>Datos Intervenci�n por Paciente</legend>
<table width="100%" border=0>
  <tr>
    <td width="15%"><b>N�mero de Recibo:</b></td>
    <td align="left"><input type="text" name="num_recibo" id="num_recibo" size="10" value="{$num_recibo}"><b>*</b></td>
  </tr>
  <tr>
    <td width="15%"><b>Paciente:</b></td>
    <td align="left"><input type="text" name="criterio" id="criterio" size="15" onKeyup="cargarCombo('id_paciente');">&nbsp;
      <select name="id_paciente" id="id_paciente">
        {html_options options=$pacien_options selected=$id_paciente}
      </select><b>*</b>&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_paciente' ); ">Paciente Nuevo</a>
    </td>
  </tr>
  <tr>
    <td width="15%"><b>Fecha de la Intervenci�n:</b></td>
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
    <td><b>Tipo de Operaci�n:</b></td>
     <td align="left">
      <select name="id_tpoperacion" id="id_tpoperacion">
        {html_options options=$tpopera_options selected=$id_tpoperacion}
      </select>
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
    <td><b>Anestesiologo:</b></td>
    <td>
      <select name="id_doctor_anestesia" id="id_doctor_anestesia">
        {html_options options=$doctorAnes_options selected=$id_doctor_anestesia}
      </select><b>*</b>  
    </td>
  </tr>
  <tr>
    <td><b>Monto Total:</b></td>
    <td><input type="text" name="monto_total" id="monto_total" size="17" value="{$monto_total}"><b>*</b></td>
  </tr>
  <tr>
    <td><b>Monto SAP:</b></td>
    <td><input type="text" name="monto_sap" id="monto_sap" size="17" value="{$monto_sap}"></td>
  </tr>
  <tr>
    <td><b>Responsable:</b></td>
    <td>
      <select name="id_responsable" id="id_responsable">
        {html_options options=$respon_options selected=$id_responsable}
      </select>&nbsp;&nbsp;<a href="#" onclick=" runMode( 'crear_responsable' ); ">Responsable Nuevo</a>
    </td>
  </tr>
  <tr>
    <td><b>Observaci�n:</b></td>
    <td><input type="text" name="sobservacion" id="sobservacion" size="60" value="{$sobservacion}"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" ><font color="#0F305A" size="0" > (*) Estos campos son obligatorios</font></td>
  </tr>
</table>
</fieldset>
<br/><br/>
<table width="75%" cellpadding="1" align="center" id="tabla">
  <tr>
  </tr>
  <tr class="titulodonforojo">
     <th>&nbsp;</th>
     <th>Intervenci�n</th>
     <th>Observaci�n</th>
     <th>&nbsp;</th>
  </tr>
  { if !$ArrDetalle }
    <tr class={$field.clase}>
      <td><input type="text" name="criterio_0" size="5" id="criterio_0" onKeyup="cargarCombo('id_intervencion_0');">
      <td>
        <select name="id_intervencion_0" id="id_intervencion_0"> 
        </select>
      </td>
      <td><input type="text" name="sobservacion_0" size="50" id="sobservacion_0"></td>
      <td align="center"><a href="#" onClick="agregarFila();"><img src="imagenes/b_add.gif"></a></td>
    </tr>
  {else}
    {foreach from=$ArrDetalle key=Id item=field}
      <tr id="trDetalle_{$field.linea}" class={$field.clase}>
        <td><input type="text" name="criterio_{$field.linea}" size="5" id="criterio_{$field.linea}" onKeyup="cargarCombo('id_intervencion_{$field.linea}');">
        <td>
          <select id="id_intervencion_{$field.linea}" name="id_intervencion_{$field.linea}">
            <option label="{$field.label}" value="{$field.id_interven}">{$field.label}</option>
          </select>
<!--          <td><input type="text" name="nmonto_{$field.linea}" size="17" id="nmonto_{$field.linea}" value="{$field.monto}"></td> -->
          <td><input type="text" name="sobservacion_{$field.linea}" size="50" id="sobservacion_{$field.linea}" value="{$field.sobservacion}"></td>
          {if $field.linea == 0 }
            <td align="center"><a href="#" onClick="agregarFila();"><img src="imagenes/b_add.gif"></a></td>
          {else}
            <td><a href="#" onClick="eliminaFila('{$field.linea}');"><img src="imagenes/b_drop.png"></a></td>
          {/if}
        </td>
      </tr>
    {/foreach}
  {/if}
</table>
<table width="75%" cellpadding="1" align="center" id="tabla">
    <tr>
      <td align="center">
        <input type="reset" id="btnCancelar" value="Cancelar">
        <input type="button" id="btnEnviar" onClick=" runMode('enviar', '{$id}');" value="Enviar">
        {if $bvolver == 1}
          <input type="button" id="btnVolver" onClick=" runMode('volver');" value="Volver">
        {/if}
      </td>
    </tr>
</table>
<input type="hidden" name="accion" id="accion">
<input type="hidden" name="id" id="id">
{ if $bnumFila == 1 }
  <input type="hidden" name="numFila" id="numFila" value="{$numFila}">
{/if}
</FORM>
