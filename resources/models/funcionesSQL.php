<?php
 class FuncionesSQL extends Conexion{


function obtener_resultados($resultado){
    return mysqli_fetch_assoc($resultado);// busca filas y almacena como una matriz
}
function traerNombre($ciudad,$tipo){
    $resultado = mysqli_query(Conexion::conectando2(), "select * from mapa where poblacion='$ciudad' and tipo='$tipo';");
    return $resultado;
}}
?>