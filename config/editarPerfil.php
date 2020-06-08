<?php

require 'config.php';
require 'funciones.php';
session_start();

$conexion = conexion($bd_config);
if ($_POST) {
    $descripciones = array();
    $idsOf = array();
    $idEmpleado = $_SESSION['id'];
    if (isset($_POST['editar'])) {

        foreach ($_POST as $clave => $valor) {
            if ($clave >= 100) {
                array_push($descripciones, $valor);
            } else if ($clave >= 50 && $clave < 100) {
                array_push($idsOf, $valor);
            }
        }
        for ($i = 0; $i < sizeof($descripciones); $i++) {
            actualizar_oficios($descripciones[$i], $idsOf[$i], $idEmpleado, $conexion);
        }
        header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
    } else if (isset($_POST['eliminar'])) {
        $oficio = limpiarDatos(($_POST['idTrabajo']));
        eliminar_oficio($oficio, $idEmpleado, $conexion);

        header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
    } else if (isset($_POST['cargarOficios'])) {
        $oficiosDisponibles = obtener_oficios_disponibles($idEmpleado, $conexion);

        echo json_encode($oficiosDisponibles);
    } else if (isset($_POST['agregarNuevo'])) {
        foreach ($_POST as $clave => $valor) {

            if ($clave >= 100) {
                array_push($descripciones, $valor);
            } else if ($clave >= 50 && $clave < 100) {
                array_push($idsOf, $valor);
            }
        }

        asignar_oficios($idsOf, $descripciones, $idEmpleado, $conexion);


        header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
    } else if (isset($_POST['infoPers'])) {
        $nombre = limpiarDatos($_POST['nombre']);
        $pass1 = limpiarDatos($_POST['contrasena1']);
        $pass2 = limpiarDatos($_POST['contrasena2']);

        if ($pass1 == $pass2) {
            actualizar_info_personal($nombre, $pass1, $idEmpleado, $conexion);

            header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
        } else {
            echo '<script type="text/javascript">alert("Las contraseñas no coinciden");</script>';
        }
    } else if (isset($_POST['contacto'])) {
        $tel = limpiarDatos($_POST['tel']);
        $correo = limpiarDatos($_POST['correo']);


        if ($_FILES['file']['name'] == "") {
            actualizar_datos_contacto($tel, $correo, $idEmpleado, $conexion);
        } else {
            $nombreImg = $_FILES['file']['name'];
            $ruta = $_FILES['file']['tmp_name'];
            $destino = '../' . $blog_config['carpeta_imagenes'] . $nombreImg;

            if (copy($ruta, $destino)) {
                actualizar_datos_contacto($tel, $correo, $idEmpleado, $conexion);
                actualiza_imagen($nombreImg, $idEmpleado, $conexion);
            }
        }
        header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
    } else if (isset($_POST['perfilEmpleador'])) {
        $nombre = limpiarDatos($_POST['nombre']);
        $correo = limpiarDatos($_POST['correo']);
        $pass1 = limpiarDatos($_POST['contrasena1']);
        $pass2 = limpiarDatos($_POST['contrasena2']);

        if ($pass1 == $pass2) {
            actualizar_empleador($nombre, $correo, $pass1, $_SESSION['id'], $conexion);
            header('Location: ' . RUTA . 'datosPerfilEmpleador.php');
        } else {
            echo '<script type="text/javascript">alert("Las contraseñas no coinciden");</script>';
        }
    } else if (isset($_POST['updateUbicacion'])) {
        $calle = limpiarDatos($_POST['calle']);
        $colonia = limpiarDatos($_POST['colonia']);
        $cp = limpiarDatos($_POST['cp']);
        $pais = limpiarDatos($_POST['pais']);
        $estado = limpiarDatos($_POST['estado']);
        $ciudad = limpiarDatos($_POST['ciudad']);

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

        actualzar_ubicacion($lat, $lon, $pais, $estado, $ciudad, $_SESSION['id'], $conexion);

        header('Location: ' . RUTA . 'datosPerfilEmpleado.php');
    }
}
?>