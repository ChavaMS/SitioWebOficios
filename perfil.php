<?php 

session_start();

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);

if(ISSET($_SESSION['id']) && ISSET($_SESSION['session'])){

    $idUser = $_SESSION['id'];

    //DATOS GENERALES
    $datosUser = obtener_datos_usuario($idUser,$conexion);
    $datosUser = $datosUser[0];

    //OFICIOS
    $oficios_nombre = obtener_empleos($idUser,$conexion);
    $oficios_desc = obtener_oficios_descripcion($idUser,$conexion);

    $numOficios = sizeof($oficios_desc);

    //COMENTARIOS
    $id_trabajos = obtener_id_trabajos($idUser,$conexion);
    for($i = 0; $i < sizeof($id_trabajos); $i++){
        $comments[$i] = obtener_comentarios($idUser,$id_trabajos[$i][0],$conexion);
    }

    //RATING
    $rating = round(obtener_rating($idUser,$conexion));
    
}else if(ISSET($_GET['id'])){
    $idUser = $_GET['id'];

    //DATOS GENERALES
    $datosUser = obtener_datos_usuario($idUser,$conexion);
    $datosUser = $datosUser[0];

    //OFICIOS
    $oficios_nombre = obtener_empleos($idUser,$conexion);
    $oficios_desc = obtener_oficios_descripcion($idUser,$conexion);

    $numOficios = sizeof($oficios_desc);

    //COMENTARIOS
    $id_trabajos = obtener_id_trabajos($idUser,$conexion);

    for($i = 0; $i < sizeof($id_trabajos); $i++){
        $comments[$i] = obtener_comentarios($idUser,$id_trabajos[$i][0],$conexion);
    }

    //RATING
    $rating = round(obtener_rating($idUser,$conexion));
}else{
    header('Location: index.php');
}



require 'header.php';
require 'views/perfil.view.php';
require 'footer.php';
