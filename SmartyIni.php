<?php

// load Smarty library
#require('c:\wamp\Smartylibs\Smarty.class.php');
require('c:\xampp\htdocs\Sociproma\libs\Smarty.class.php');
#require('/opt/lampp/htdocs/sociproma/libs/Smarty.class.php');

class SmartyIni extends Smarty {

public function SmartyIni() {
	
  parent::__construct(); 

// Class Constructor. 
// These automatically get set with each new instance.

  //$this->Smarty();

  $this->template_dir = 'C:\xampp\htdocs\Sociproma\smarty\templates';
  #$this->template_dir = '/opt/lampp/htdocs/smarty/templates';
  #$this->config_dir = ' C:\wamp\www\Smartyconfig';
  #$this->config_dir = '/opt/lamppp/htdocs/smarty/config';
  #$this->cache_dir = 'C:\wamp\Smartycache';
  #$this->cache_dir = '/opt/lampp/smarty/cache';
  $this->cache_dir = 'C:\xampp\htdocs\Sociproma\smarty\cache';
  #$this->compile_dir = 'C:\wamp\Smartytemplates_c';
  $this->compile_dir = 'C:\xampp\htdocs\Sociproma\smarty\templates_c';;


}

}
?>
