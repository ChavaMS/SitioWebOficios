<?php 


require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);


if(!$conexion){
    header('Location: ../error.php');
}


$oficios = obtener_oficios($conexion);


require 'views/registro.view.php';
require 'footer.php';


?>