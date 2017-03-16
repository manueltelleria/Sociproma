<?php

  session_start();

  require('SmartyIni.php');

  $smarty  = new SmartyIni;

  $smarty->assign('subtitulo', '');
  $smarty->assign('error_msg', '');

  if (!$_SESSION['usuario_log']){
    header('location: http://localhost:8080/sociproma/iniciosesion.php');
  }
  else{
    $smarty->assign('usuario_log', $_SESSION['usuario_log']);
    $smarty->assign('nombre_log', $_SESSION['nombre_log'].", ".$_SESSION["apellido_log"]);
    $smarty->assign('badministra', $_SESSION['badministra']);
  }

  $smarty->display('Home.tpl');

?>
