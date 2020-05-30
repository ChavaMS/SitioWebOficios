<?php

require 'config.php';
require 'funciones.php';

if (isset($_POST['idTrabajo']) && isset($_POST['usuaID'])) {
    $idTrabajo = limpiarDatos(($_POST['idTrabajo']));
    $idEmpleado = limpiarDatos($_POST['usuaID']);
    $mensaje = limpiarDatos($_POST['mensaje']);
    session_start();
    $idEmpleador = $_SESSION['id'];


    $conexion = conexion($bd_config);
    insertar_comentario($idEmpleador,$idEmpleado,$idTrabajo,$mensaje,$conexion);
}

?>
