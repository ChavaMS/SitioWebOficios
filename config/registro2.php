<?php


require 'config.php';
require 'funciones.php';

$nombre = ISSET($_POST['nombre']) ? limpiarDatos($_POST['nombre']) : null;
$correo = ISSET($_POST['correo']) ? limpiarDatos($_POST['correo']) : null;
$contraseña1 = ISSET($_POST['contraseña1']) ? limpiarDatos($_POST['contraseña1']) : null;
$contraseña2 = ISSET($_POST['contraseña2']) ? limpiarDatos($_POST['contraseña2']) : null;
$fechaNac = ISSET($_POST['fechaNac']) ? limpiarDatos($_POST['fechaNac']) : null;
$conexion = conexion($bd_config);

if(ISSET($nombre) && ISSET($correo) && ISSET($contraseña1) && ISSET($contraseña2) && ISSET($fechaNac)){
    if(($contraseña1 == $contraseña2) && crear_empleador($nombre, $correo,$contraseña1,$fechaNac,$conexion)){
        header('Location: ' . RUTA . 'inicio.php');
    }else{
        echo 'Error';
    }
}


?>