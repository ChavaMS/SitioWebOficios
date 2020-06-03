<?php

require 'config.php';
require 'funciones.php';
session_start();

$conexion = conexion($bd_config);
if ($_POST) {
    $idEmpleado = $_SESSION['id'];
    if (isset($_POST['editar'])) {
        $descripciones = array();
        $idsOf = array();
        
         
        foreach ($_POST as $clave => $valor) {
            if ($clave >= 100) {
                array_push($descripciones, $valor);
            } else if ($clave >= 50 && $clave < 100) {
                array_push($idsOf, $valor);
            } 
        }
        //print_r($descripciones);
        //print_r($idsOf);
        for ($i = 0; $i < sizeof($descripciones); $i++) {
            actualizar_oficios($descripciones[$i], $idsOf[$i], $idEmpleado, $conexion);
        }

    }else if(isset($_POST['eliminar'])){
        $oficio = limpiarDatos(($_POST['idTrabajo']));
        //echo $idEmpleado;
        //echo $oficio;
        eliminar_oficio($oficio,$idEmpleado,$conexion);
    }else if(isset($_POST['cargarOficios'])){
        $oficiosDisponibles = obtener_oficios_disponibles($idEmpleado,$conexion);
        /*for($i = 0; $i < sizeof($oficiosDisponibles); $i++){
            $oficiosArray['nombre'] = $oficiosDisponibles[$i][1];
            $oficiosArray['id'] = $oficiosDisponibles[$i][0];
        }*/

        echo json_encode($oficiosDisponibles);
        //print_r($oficiosDisponibles);
    }
}

?>