<?php

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);
session_start();

//comprobarSession();

if (!$conexion) {
    header('Location: index.php');
}
if ($_GET) {
    $NumOfic = 0;
    $j = 0;
    $x = 0;
    $i = 0;
    $id = 0;
    $indicePuntuacion = 0;
    $puntuacion_filtrada = array();
    $oficios = array();
    $puntuacion = array();
    $tamano = array();
    $color = array();
    $ciudad = limpiardatos($_GET['ciudad']);
    $estado = limpiardatos($_GET['estado']);
    $distancias = array();
    $turnos_array = array();
    $rating = array();
    $url = '';
    if (isset($_POST['busqueda']) || isset($_GET['busqueda'])) {
        //VARIABLES

        if (isset($_POST['busqueda'])) {
            $busqueda = limpiarDatos($_POST['busqueda']);
            $latFrom = $_POST['lat'];
            $lonFrom = $_POST['lon'];
            $turnos = isset($_POST['turno']) ? $_POST['turno'] : '';
            $turnos_string = "";
            $ordenamiento = isset($_POST['ordenamiento']) ? $_POST['ordenamiento'] : '';

            if ($turnos != '') {
                foreach ($turnos as $turno) {
                    $turnos_string .= $turno;
                }
            }
        } else if (isset($_GET['pags'])) {
            $busqueda = limpiarDatos($_GET['busqueda']);
            $latFrom = $_GET['lat'];
            $lonFrom = $_GET['lon'];
            $turnos_string = isset($_GET['turno']) ? $_GET['turno'] : '';
            $ordenamiento = isset($_GET['ordenamiento']) ? $_GET['ordenamiento'] : '';
        }

        $url = '&pags=true&busqueda=' . $busqueda . '&lat=' . $latFrom  . '&lon=' . $lonFrom . '&turno=' . $turnos_string . '&ordenamiento=' . $ordenamiento;

        $color[0] = "bg-success";
        $color[1] = "bg-info";
        $color[2] = "bg-warning";
        $color[3] = "bg-danger";

        for ($x = 1; $x < 11; $x++) {
            $tamano[$x - 1] = 10 * ($x);
        }

        //PROCESOS
        $usuarios = obtener_empleados_por_busqueda($blog_config['post_por_pagina'], $busqueda, $turnos_string, $ciudad, $estado, $conexion);


        foreach ($usuarios as $usuario) {
            if ($latFrom != '' && $lonFrom != '') {
                $lat1 = floatval($latFrom);
                $lon1 = floatval($lonFrom);
                $lat2 = floatval($usuario['lat']);
                $lon2 = floatval($usuario['lon']);
                $distancias[$i] = obtener_distancia($lat1, $lon1, $lat2, $lon2);
            }

            $turnos_array[$i] = str_split($usuario['schedule']);
            $rating[$i] = round(obtener_rating($usuario['id'], $conexion));
            $oficios[$i++] = obtener_empleos($usuario['id'], $conexion);
        }

        if ($ordenamiento != '') {
            if ($ordenamiento == 'ubicacion') {
                for ($h = 0; $h < sizeof($distancias); $h++) {
                    for ($t = 0; $t < sizeof($distancias) - 1; $t++) {
                        if (intval($distancias[$t][1]) > intval($distancias[$t + 1][1])) {
                            $aux = $distancias[$t];
                            $aux2 = $usuarios[$t];
                            $distancias[$t] = $distancias[$t + 1];
                            $usuarios[$t] = $usuarios[$t + 1];
                            $distancias[$t + 1] = $aux;
                            $usuarios[$t + 1] = $aux2;
                        }
                    }
                }
            } else if ($ordenamiento == 'rating') {
                for ($h = 0; $h < sizeof($rating); $h++) {
                    for ($t = 0; $t < sizeof($rating) - 1; $t++) {
                        if (($rating[$t]) < ($rating[$t + 1])) {
                            $aux = $rating[$t];
                            $aux2 = $usuarios[$t];
                            $rating[$t] = $rating[$t + 1];
                            $usuarios[$t] = $usuarios[$t + 1];
                            $rating[$t + 1] = $aux;
                            $usuarios[$t + 1] = $aux2;
                        }
                    }
                }
            }
        }

        require 'header.php';
        require 'views/inicio.view.php';
        require 'footer.php';
    } else if (isset($_GET['estado']) && isset($_GET['ciudad'])) {

        $color[0] = "bg-success";
        $color[1] = "bg-info";
        $color[2] = "bg-warning";
        $color[3] = "bg-danger";

        for ($x = 1; $x < 11; $x++) {
            $tamano[$x - 1] = 10 * ($x);
        }

        //PROCESOS
        $usuarios = obtener_empleados($blog_config['post_por_pagina'], $ciudad, $estado, $conexion);
        if ($usuarios == null) {
            header("Location: index.php?err=true");
        }
        foreach ($usuarios as $usuario) {
            $turnos_array[$i] = str_split($usuario['schedule']);
            $oficios[$i] = obtener_empleos($usuario['id'], $conexion);
            $rating[$i++] = round(obtener_rating($usuario['id'], $conexion));
        }

        require 'header.php';
        require 'views/inicio.view.php';
        require 'footer.php';
    } else {
        header("Location: index.php");
    }
}
