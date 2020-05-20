<?php 

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);
session_start();

//comprobarSession();

if(!$conexion){
    header('Location: ../error.php');
}

//VARIABLES
$NumOfic = 0;
$j = 0;
$indicePuntuacion = 0;
$puntuacion_filtrada = array();
$oficios = array();
$puntuacion = array();
$i = 0;
$id = 0;

//PROCESOS
$usuarios = obtener_empleados($blog_config['post_por_pagina'],$conexion);

foreach($usuarios as $usuario){
    //$puntuacion[$i] = obtener_puntuacion($usuario['id'],$conexion);
    $oficios[$i++] = obtener_empleos($usuario['id'],$conexion);
}

/*for($i = 0; $i < sizeof($puntuacion); $i++){
    $puntuacion_filtrada[$indicePuntuacion++] = filtrar_puntuacion($puntuacion[$i]);
}*/

require 'header.php';
require 'views/index.view.php';
require 'footer.php';

?>