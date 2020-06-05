<?php

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);
session_start();

//comprobarSession();

if (!$conexion) {
    header('Location: index.php');
}
if (isset($_POST['busqueda'])) {
    //VARIABLES
    $NumOfic = 0;
    $j = 0;
    $indicePuntuacion = 0;
    $puntuacion_filtrada = array();
    $oficios = array();
    $puntuacion = array();
    $i = 0;
    $id = 0;
    $tamano = array();
    $color = array();
    $nombre_oficio = limpiarDatos($_POST['oficio']);
    $ciudad = limpiardatos($_GET['ciudad']);
    $estado = limpiardatos($_GET['estado']);
    $latFrom = $_POST['lat'];
    $lonFrom = $_POST['lon'];
    $distancias = array();
    $turnos = $_POST['turno'];
    $turnos_string = "";

    foreach($turnos AS $turno){
        $turnos_string .= $turno;
    }

    $color[0] = "bg-success";
    $color[1] = "bg-info";
    $color[2] = "bg-warning";
    $color[3] = "bg-danger";

    for ($x = 1; $x < 11; $x++) {
        $tamano[$x - 1] = 10 * ($x);
    }

    //PROCESOS
    $usuarios = obtener_empleados_por_busqueda($blog_config['post_por_pagina'], $nombre_oficio, $turnos_string, $ciudad, $estado, $conexion);
    foreach ($usuarios as $usuario) {
        if ($latFrom != '' && $lonFrom != '') {
            $distancias[$i] = obtener_distancia((floatval($lonFrom) - floatval($usuario['lon'])), $latFrom, $usuario['lat']);
        }
        $oficios[$i++] = obtener_empleos($usuario['id'], $conexion);
    }

    require 'header.php';
    require 'views/inicio.view.php';
    require 'footer.php';
} else if (isset($_GET['estado']) && isset($_GET['ciudad'])) {
    //VARIABLES
    $NumOfic = 0;
    $j = 0;
    $indicePuntuacion = 0;
    $puntuacion_filtrada = array();
    $oficios = array();
    $puntuacion = array();
    $i = 0;
    $id = 0;
    $tamano = array();
    $color = array();
    $ciudad = limpiardatos($_GET['ciudad']);
    $estado = limpiardatos($_GET['estado']);
    $distancias = array();


    $color[0] = "bg-success";
    $color[1] = "bg-info";
    $color[2] = "bg-warning";
    $color[3] = "bg-danger";

    for ($x = 1; $x < 11; $x++) {
        $tamano[$x - 1] = 10 * ($x);
    }

    //PROCESOS
    $usuarios = obtener_empleados($blog_config['post_por_pagina'], $ciudad, $estado, $conexion);

    foreach ($usuarios as $usuario) {
        $oficios[$i++] = obtener_empleos($usuario['id'], $conexion);
    }

    

    require 'header.php';
    require 'views/inicio.view.php';
    require 'footer.php';
} else {
    header("Location: index.php");
}

?>