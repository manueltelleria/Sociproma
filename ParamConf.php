<?php

class ParamConf {

  var $localhost;

  var $template_dir;

  var $cache_dir;

  var $compile_dir;

  var $libSmarty;

/* Método Constructor: Cada vez que creemos una variable de esta clase, se ejecutará esta función */

  function ParamConf(){
    require_once('libs/spyc.php');

    $Param = Spyc::YAMLLoad('config.yaml'); 

    $this->localhost = $Param['controller']['localhost'];
    $this->template_dir = $Param['smarty']['template_dir'];
    $this->cache_dir = $Param['smarty']['cache_dir'];
    $this->compile_dir = $Param['smarty']['compile_dir'];
    $this->libSmarty = $Param['smarty']['lib'];


  }

  function getLocalhost() {
    return $this->localhost;
  }

  function getTemplateDir() {
    return $this->template_dir;
  }

  function getCacheDir() {
    return $this->cache_dir;
  }

  function getCompileDir() {
    return $this->compile_dir;
  }

  function getLibSmarty() {
    return $this->libSmarty;
  }
}