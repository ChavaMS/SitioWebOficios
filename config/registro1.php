<?php

require 'config.php';
require 'funciones.php';


//Variables
$nombre;
$pass1;
$pass2;
$cp;
$desc_oficios = array();
$id_oficios = array();
$correo;
$tel;
$genero;
$fechaNac;
$pais;
$estado;
$ciudad;
$calle;
$colonia;
$cp;
$conexion = conexion($bd_config);
$id = 0;
$turnos;
$turnos_string = '';

if (isset($_FILES['file']['name']) && isset($_FILES['file']['tmp_name'])) {

    $nombreImg = $_FILES['file']['name'];
    $ruta = $_FILES['file']['tmp_name'];
    $destino = '../' . $blog_config['carpeta_imagenes'] . $nombreImg;

    foreach ($_POST as $campo => $valor) {
        if ($campo == strval($id)) {
            array_push($id_oficios, limpiarDatos($valor));
            $id++;
        } else if ($campo == 'nombre') {
            $nombre = limpiarDatos($valor);
        } else if ($campo == 'contrasena1') {
            $pass1 = limpiarDatos($valor);
        } else if ($campo == 'contrasena2') {
            $pass2 = limpiarDatos($valor);
        } else if ($campo == 'CP') {
            $cp = limpiarDatos($valor);
        } else if ($campo != 'turno' && $campo != 'nombre' && $campo != 'contrasena1' && $campo != 'contrasena2' && $campo != 'CP' && $campo != 'direccion' && $campo != 'tel' && $campo != 'correo' && $campo != 'fechaNac' && $campo != 'genero' && $campo != strval($id) && $campo != 'pais' && $campo != 'estado' && $campo != 'ciudad' && $campo != 'calle' && $campo != 'colonia' && $campo != 'cp') {
            array_push($desc_oficios, limpiarDatos($valor));
        } else if ($campo == 'fechaNac') {
            $fechaNac = limpiarDatos($valor);
        } else if ($campo == 'genero') {
            $genero = limpiarDatos($valor);
        } else if ($campo == 'correo') {
            $correo = limpiarDatos($valor);
        } else if ($campo == 'tel') {
            $tel = limpiarDatos($valor);
        } else if ($campo == 'pais') {
            $pais = $valor;
        } else if ($campo == 'estado') {
            $estado = limpiarDatos($valor);
        } else if ($campo == 'ciudad') {
            $ciudad = limpiarDatos($valor);
        } else if ($campo == 'calle') {
            $calle = limpiarDatos($valor);
        } else if ($campo == 'colonia') {
            $colonia = limpiarDatos($valor);
        } else if ($campo == 'cp') {
            $cp = limpiarDatos($valor);
        } else if ($campo == 'turno') {
            $turnos = $valor;
        }
    }

    if ($turnos != '') {
        foreach ($turnos as $turno) {
            $turnos_string .= $turno;
        }
    }

    $addressFrom = $cp . '+' . $calle . '+' . $colonia . ',' . $ciudad . '+' . $estado . '+' . $pais;
    $formattedAddrFrom = str_replace(' ', '+', $addressFrom);

    //Geolocalizacion
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&key=AIzaSyDgRN1AR5CnGjgdcc3f93CzMho80a2yWog');
    $datos = json_decode($geocode);
    if (!empty($outputFrom->error_message)) {
        echo '<script type="text/javascript"> alert("Error");';
    }

    $lat = $datos->results[0]->geometry->location->lat;
    $lon = $datos->results[0]->geometry->location->lng;


    if (copy($ruta, $destino)) {
        $usuario = crear_empleado($nombre, $correo, $pass1, $tel, $fechaNac, $lat, $lon, $pais, $estado, $ciudad, $turnos_string, $nombreImg, $conexion);
        if (!$usuario) {
            echo 'Error';
        } else {
            asignar_oficios($id_oficios, $desc_oficios, $usuario[1], $conexion);
            header('Location: ' . RUTA . 'index.php');
        }
    }
} else {
    echo '<script type="text/javascript"> alert("Faltan datos");';
}

?>
