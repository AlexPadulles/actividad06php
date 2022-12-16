<?php
 
  class Conexion {
    
    function conectando(){
       
       $config = parse_ini_file("resources/config/config.ini");
       $con = mysqli_connect($config['host'], $config['user'], $config['password']);
       return $con;
    }
    function selecBaseDatos(){
        $config = parse_ini_file("resources/config/config.ini");
        return $config['db_name'];
    }
    function conectando2(){
       
      $config = parse_ini_file("../config/config.ini");
      $con = mysqli_connect($config['host'], $config['user'], $config['password'],$config['db_name']);
      return $con;
   }

  }

?>