<?php 

session_start();

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);

$oficios = obtener_oficios($conexion);

require 'header.php';
require 'views/index.view.php';
require 'footer.php';


?>