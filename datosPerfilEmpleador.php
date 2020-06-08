<?php 

session_start();

require 'config/config.php';
require 'config/funciones.php';
require 'header.php';


if($_SESSION['id'] != null){
    $conexion = conexion($bd_config);

    $empleador = obtener_info_empleador($_SESSION['id'],$conexion);
    //echo $_SESSION['id'];
}else{
    header('Location: index.php');
}


require 'views/datosPerfilEmpleador.view.php';
require 'footer.php';


?>