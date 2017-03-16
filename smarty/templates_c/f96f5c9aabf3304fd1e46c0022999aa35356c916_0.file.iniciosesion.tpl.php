<?php
/* Smarty version 3.1.30, created on 2017-03-16 17:44:22
  from "/opt/lampp/htdocs/Sociproma_linux/smarty/templates/iniciosesion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cac0e61040a0_47043404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f96f5c9aabf3304fd1e46c0022999aa35356c916' => 
    array (
      0 => '/opt/lampp/htdocs/Sociproma_linux/smarty/templates/iniciosesion.tpl',
      1 => 1489682647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
    'file:estilosgenerales.tpl' => 1,
    'file:jsgenerales.tpl' => 1,
  ),
),false)) {
function content_58cac0e61040a0_47043404 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
<!-- hojas de estilo generales -->
<?php $_smarty_tpl->_subTemplateRender("file:estilosgenerales.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- archivos de javascript generales (cargar en todas las pÃ¡ginas) -->
<?php $_smarty_tpl->_subTemplateRender("file:jsgenerales.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">

delete_cookie ( "anestesia_session" );

function forma_enviar(){
  forma = document.getElementById('iniciosesion');

  if ( validate_iniciosesion( forma )){
    forma.submit();
  } 
}

function validate_iniciosesion( form ){
  var alertstr = '';
  var invalid  = 0;

// susuario: standard text, hidden, password, or textarea box
  var susuario = form.elements['susuario'].value;
  if (susuario == null || susuario == "" ) {
    alertstr += '- Indique un valor válido para el campo "Usuario"\n';
    invalid++;
  }

// scontrasena: standard text, hidden, password, or textarea box
  var scontrasena = form.elements['scontrasena'].value;
  if (scontrasena == null || scontrasena == "" ) {
    alertstr += '- Indique un valor válido para el campo "Contraseña"\n';
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


<body>
<!-- Login form -->
<form method='post' name='iniciosesion' id='iniciosesion' action='http://localhost/Sociproma_linux/iniciosesion.php'>
<table align='center'>
  <tr>
    <td>Usuario:</td>
    <td><INPUT type='text' size='10' id='susuario' name='susuario'></td>
  </tr>
  <tr>
    <td>Contrase&ntilde;a:</td>
    <td><INPUT type='password' size='10' id='scontrasena' name='scontrasena'></td>
  </tr>
  <tr>
    <td colspan='2' align='center'><INPUT type='button' value='Enviar' onclick=' forma_enviar() '></td>
  </tr>
</table>
</form>
</body>
</html>
<?php }
}
