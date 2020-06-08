<?php

require 'config.php';
require 'funciones.php';

$conexion = conexion($bd_config);

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if (!isset($_POST['cerrar'])) {
    if ($email != '' && $pass != '') {
        $email = limpiarDatos($email);
        $pass = limpiarDatos($pass);

        $usuario = comprobar_usuario_empleado($email, $pass, $conexion);
        if ($usuario != false) {
            session_start();
            $_SESSION['user'] = $usuario[0];
            $_SESSION['id'] = $usuario[1];
            $_SESSION['tipo'] = 'empleado';

            $user['nombre'] = $usuario[0];
            $user['tipo'] = 'empleado';
            echo json_encode($user);
        } else {
            $usuario = comprobar_usuario_empleador($email, $pass, $conexion);

            if ($usuario != false) {
                session_start();
                $_SESSION['user'] = $usuario[0];
                $_SESSION['id'] = $usuario[1];
                $_SESSION['tipo'] = 'empleador';

                $user['nombre'] = $usuario[0];
                $user['tipo'] = 'empleador';
                echo json_encode($user);
            } else {
                echo 'false';
            }
        }
    } else {
        $res['tipo'] = 'false';
        echo json_encode($res);
    }
}else{
    session_start();
    $_SESSION['user'] = null;
    $_SESSION['id'] = null;
    $_SESSION['tipo'] = null;
    $_SESSION = array();
    session_destroy();
    echo 'true';
}
