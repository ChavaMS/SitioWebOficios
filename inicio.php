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
$tamano = array();
$color = array();


$color[0] = "bg-success";
$color[1] = "bg-info";
$color[2] = "bg-warning";
$color[3] = "bg-danger";

for($x = 1; $x < 11; $x++){
    $tamano[$x-1] = 10*($x);
}

//PROCESOS
$usuarios = obtener_empleados($blog_config['post_por_pagina'],$conexion);

foreach($usuarios as $usuario){
    $oficios[$i++] = obtener_empleos($usuario['id'],$conexion);
}

require 'header.php';
require 'views/inicio.view.php';
require 'footer.php';

?>