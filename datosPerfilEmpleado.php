<?php 
session_start();

require 'config/config.php';
require 'config/funciones.php';
if($_SESSION['id'] =! null){
    $conexion = conexion($bd_config);

    $empleado = obtener_empleado_completo($_SESSION['id'],$conexion);

    $oficios = obtener_oficios($conexion);

    $oficios_empleado = obtener_oficios_empleado($_SESSION['id'],$conexion);
    $oficios_nombre = array();
    for($x = 0; $x < sizeof($oficios_empleado); $x++){
        $oficios_nombre[$x] = obtener_nombre_oficio($oficios_empleado[$x][1],$conexion);
    }
}else{
    header('Location: index.php');
}


require 'header.php';
require 'views/datosPerfilEmpleado.view.php';
require 'footer.php';

?>