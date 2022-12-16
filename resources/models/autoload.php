<?php
  
  function autoload($clase){
   
     include $clase.".php";
   //   include "resources/models/".$clase.".php";
 
  }
       
       spl_autoload_register('autoload');
      
?>