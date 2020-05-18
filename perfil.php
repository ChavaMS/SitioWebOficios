<?php 

session_start();

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);

if(ISSET($_SESSION['id'])){

    $idUser = $_SESSION['id'];

    $datosUser = obtener_datos_usuario($idUser,$conexion);
    $datosUser = $datosUser[0];

    $oficios_nombre = obtener_empleos($idUser,$conexion);
    $oficios_desc = obtener_oficios_descripcion($idUser,$conexion);

    $numOficios = sizeof($oficios_desc);

}else{
    header('Location: index.php');
}



require 'header.php';
require 'views/perfil.view.php';
require 'footer.php';

?>