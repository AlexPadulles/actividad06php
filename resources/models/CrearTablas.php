<?php
  class CrearTablas extends Conexion{

    private $con;
    private $db;
     
    public function __construct()
    {
      $this->con = Conexion::conectando();
      $this->crearBD($this->con);
      $this->db = Conexion::selecBaseDatos();
      mysqli_select_db($this->con,$this->db);
      $this->crearTabla($this->con);
      $this->insertarDatos($this->con);

    }

    function crearBD($con){
      mysqli_query($con, "create database if not exists mapas;");
    }
    function crearTabla($con){
      mysqli_query($con, "create table if not exists mapa(
        id int primary key auto_increment,
        nombre varchar(50),
        coordenadas varchar(100),
        poblacion varchar(75),
        tipo varchar(75)
      );");
    }
    function insertarDatos($con){
      
      $nombres = array(
      "Tiro pichon",
      "Lolos",
      "Amor Universal",
      "El Pontet", 
      "Casa Blanca",
      "Black Jack",
      "Portus Massai",
      "Badem badem",
      "Turia",
      "Bar Olayo",
      "Penelope beach",
      "KU Discoteca"
      );
      $latitudes = array(
      "{lat: 38.71761778975157, lng: -0.4566334867266882}",
      "{lat: 38.68901782544378, lng: -0.46026578438081156}",
      "{lat: 38.71017698860972, lng: -0.4664116556462987}",
      "{lat: 38.689277626928266, lng: -0.4925041843716742}",
      "{lat: 38.69485283721854, lng: -0.4822977200044424}",
      "{lat: 38.69515209706089, lng: -0.48255935327805505}",
      "{lat: 38.53103297334406, lng: -0.16023213988022847}",
      "{lat: 38.529003750376255, lng: -0.16193707737543767}",
      "{lat: 38.53454043899436, lng: -0.15475897785783016}",
      "{lat: 38.52746515104828, lng: -0.1707784778317866}",
      "{lat: 38.53618650846999, lng: -0.12457625874518716}",
      "{lat: 38.546298500192364, lng: -0.11772868410230627}"
      );
      $localidad = array(
      "Alcoy",
      "Alcoy",
      "Alcoy",
      "Alcoy",
      "Alcoy",
      "Alcoy",
      "Benidorm",
      "Benidorm",
      "Benidorm",
      "Benidorm",
      "Benidorm",
      "Benidorm"
      );
      $tipo = array(
      "Bar", 
      "Restaurante",
      "Restaurante",
      "Bar",
      "Discoteca",
      "Discoteca",
      "Restaurante",
      "Bar",
      "Restaurante",
      "Bar",
      "Discoteca",
      "Discoteca"
      ); 

      $stmt = mysqli_prepare($con, "insert into mapa(nombre, coordenadas, poblacion, tipo) values(?, ?, ?, ?);");
      
      for ($i= 0 ; $i < count($nombres);$i++) {
        mysqli_stmt_bind_param($stmt, "ssss", $nombres[$i], $latitudes[$i], $localidad[$i], $tipo[$i]);
        mysqli_stmt_execute($stmt);
      }
       $stmt->close();
       

    }

  }
   

?>