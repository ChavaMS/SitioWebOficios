<?php


require 'config/config.php';
require 'config/funciones.php';

session_start();

if ($_SESSION['id'] != null) {
    $conexion = conexion($bd_config);

    $empleado = obtener_empleado_completo($_SESSION['id'], $conexion);

    $location = $empleado[0]['lat'] . ',' . $empleado[0]['lon'];

    //Geolocalizacion
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $location . '&key=AIzaSyDgRN1AR5CnGjgdcc3f93CzMho80a2yWog');
    $datos = json_decode($geocode);
    if (!empty($outputFrom->error_message)) {
        echo '<script type="text/javascript"> alert("Error");';
    }

    //CALLE - COLONIA - CIUDAD - ESTADO - PAIS - CP
    for($i = 0; $i < 6; $i++){
        $ubicacion[$i] = $datos->results[0]->address_components[$i+1]->long_name;
    }

    $oficios = obtener_oficios($conexion);

    $oficios_empleado = obtener_oficios_empleado($_SESSION['id'], $conexion);
    $oficios_nombre = array();
    for ($x = 0; $x < sizeof($oficios_empleado); $x++) {
        $oficios_nombre[$x] = obtener_nombre_oficio($oficios_empleado[$x][1], $conexion);
    }
} else {
    header('Location: index.php');
}


require 'header.php';
require 'views/datosPerfilEmpleado.view.php';
require 'footer.php';
?>