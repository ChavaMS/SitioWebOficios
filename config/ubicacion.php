<?php

require 'config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if (isset($_POST['inicio'])) {
    $ids = array();
    foreach ($_POST as $clave => $valor) {
        if ($clave != 'inicio')
            array_push($ids, $valor);
    }
    $coordenadas = array();

    for ($i = 0; $i < sizeof($ids); $i++) {
        array_push($coordenadas, obtener_coordenadas($ids[$i], $conexion));
    }

    print json_encode(array("coordenadas" => $coordenadas));
} else if (isset($_POST['perfil'])) {
    $id = limpiardatos($_POST['idUsu']);

    $coordenadas = obtener_coordenadas($id, $conexion);
    print json_encode(array("coordenadas" => $coordenadas));
}

?>