<?php
include_once('teamplates/header.php');

?>

<div class="grid grid-cols-1 lg:grid-cols-4" >
    
<aside id="cont" class="w-64 h-96 mt-20 ml-28 border-4 border-yellow-400 rounded contenedor" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 px-3 " >
      <ul class="space-y-2">
         <li> 
              <span class="ml-3 text-lg text-white">Temperatura en <?php echo $_POST['ciudad']?></span>
         </li>
         <hr>
         
         <li> 
              <span class=" ml-3 text-white text-8xl"><?php echo $temp?>ºc</span>
         </li>
         <br>
         <li class="text-center pt-2"> 
              <small class="text-red-500 ">Temp MAX<span class="ml-3 mt-10 text-lg text-white"><?php echo $tempMax?>ºc</span></small> 
              
         </li>
      
         <li class="text-center pt-2"> 
              <small class="text-blue-500 ">Temp MIN<span class="ml-3 mt-10 text-lg text-white"><?php echo $tempMin?>ºc</span></small> 
         </li>
        
         <li class="text-center pt-2"> 
              <span class="text-base text-white">Humedad <?php echo $humedad?>%</span>
         </li>
         <hr>
         <li class="text-center pt-2"> 
              <span class="text-base text-white"><?php echo  date("d") . "/" . date("m") . "/" . date("Y")." | ".date("H:i:s", $time);?></span>
         </li>  
      </ul>
   </div>
</aside>

  <div id="map" class="h-96 lg:h-full w-3/4  col-span-3 mt-10 border-4 border-yellow-400 rounded"></div>
  
</div>
<div class="mt-24 text-center ">
<a href="../../index.php"><button class="text-green-300 w-60 h-10 hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none 
  focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white 
  dark:hover:bg-green-300 dark:focus:white">Volver al index</button></a>
</div>


<script>
let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: <?php echo $ciudad?>,
    zoom: 13,
  });
  <?php $i = 0;
   foreach($consultas as $consul){
   ?>
  
  infowindow<?php echo $i;?>= new google.maps.InfoWindow({content:'<?php echo $consul['nombre'];?>'+" .Google quiere que active la facturacion, son muy pesados",});

  const marker<?php echo $i;?>= new google.maps.Marker({
    position:<?php echo $consul['coordenadas'];?>,
    map:map,
    title:'<?php echo $consul['nombre'];?>',
  })
  marker<?php echo $i;?>.addListener('click', function(){
  infowindow<?php echo $i;?>.open(map, marker<?php echo $i;?>);
  });  
 <?php $i++; }?>
}
window.initMap = initMap;  


</script>


<?php

include_once('teamplates/footer.php');
?>

 