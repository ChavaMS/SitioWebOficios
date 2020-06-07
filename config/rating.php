<?php 

require 'config.php';
require 'funciones.php';

if($_POST){
    session_start();
    $conexion = conexion($bd_config);
    $rating = $_POST['rating'];
    $idEmpleado = $_POST['idEmpleado'];
    $idEmpleador = $_SESSION['id'];

    
    if(comprobar_rating($idEmpleado,$idEmpleador,$conexion)){
        agregar_calificacion($rating, $idEmpleado,$idEmpleador,$conexion);
    }else{
        actualizar_calificacion($rating, $idEmpleado,$idEmpleador,$conexion);
    }
}


?>
