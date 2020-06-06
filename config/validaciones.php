<?php 

require 'config.php';
require 'funciones.php';

if($_POST){
    $conexion = conexion($bd_config);
    $correo = limpiarDatos(($_POST['correo']));

    if(!comprobar_correo($correo,$conexion)){
        echo 'existe';
    }else{
        echo 'no existe';
    }
}


?>