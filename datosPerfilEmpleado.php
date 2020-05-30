<?php 
session_start();

require 'config/config.php';
require 'config/funciones.php';
if($_SESSION['id'] =! null){
    $conexion = conexion($bd_config);

    $empleado = obtener_empleado_completo($_SESSION['id'],$conexion);

    $oficios = obtener_oficios($conexion);
}


require 'header.php';
require 'views/datosPerfilEmpleado.view.php';
require 'footer.php';

?>