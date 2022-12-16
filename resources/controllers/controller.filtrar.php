<?php 
 include_once('../models/autoload.php');
 // centramos el mapa en los puntos elegidos
if(isset($_POST['submit'])){
    if("Alcoy" == $_POST['ciudad']){
        $ciudad = "{lat: 38.69927594358576, lng: -0.482062304123416}";
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=38.69&lon=-0.48&lang=sp&appid=187e5823483b9252fa6f420d190fec0b&units=metric";
    }
    else if("Benidorm" == $_POST['ciudad']){
        $ciudad = "{lat: 38.542508413308106, lng: -0.12330083278720928}";
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=38.54&lon=-0.12&lang=sp&appid=187e5823483b9252fa6f420d190fec0b&units=metric";
    }
   
 // llamamos a la clase funciones para traer la tabla
    $funcion = new FuncionesSQL();
    $consultas = $funcion->traerNombre($_POST['ciudad'],$_POST['tipo']); 
    $consulta = $funcion->obtener_resultados($consultas);

    
    
    $json = file_get_contents($url);
    $datos = json_decode($json,true);
    $temp = $datos["main"]["temp"];
    $temp = round($temp);
    $tempMax = $datos["main"]["temp_max"];
    $tempMax = round($tempMax);
    $tempMin = $datos["main"]["temp_min"];
    $tempMin = round($tempMin);
    $humedad = $datos["main"]["humidity"];
    $humedad = round($humedad);
    date_default_timezone_set("Europe/Madrid");
    $time = time();

  
   
   include_once('../views/mapa.view.php');
   
}
?>

