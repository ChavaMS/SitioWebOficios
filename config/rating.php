<?php 

require 'config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

if(ISSET($_POST['inicio'])){
    $inicio = ISSET($_POST['inicio']) ? $_POST['inicio'] : 0;

    $id_empleados = obtener_id_empleados($inicio, 5, $conexion);
    
    
    $rating  = array();
    for($i = 0; $i < sizeof($id_empleados); $i++){
        $rating['valor'.$i] = obtener_rating($id_empleados[$i][0],$conexion);
    }
    
    echo json_encode($rating);
}else{
    session_start();
    if(ISSET($_SESSION['id'])){
        $rating['valor'] = obtener_rating($_SESSION['id'],$conexion);

        echo json_encode($rating);
    }else{
        echo 'error';
    }
}



?>
