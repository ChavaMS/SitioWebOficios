<?php

function conexion($bd_config)
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripcslashes($datos);
    $datos = htmlspecialchars($datos);

    return $datos;
}

function obtener_id_empleados($inicio,$post_por_pagina,$conexion){
    $sentencia = $conexion->prepare("SELECT id FROM employees LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();

    return $sentencia->fetchAll();;
}

function obtener_rating($id, $conexion){
    $sentencia = $conexion->prepare("SELECT AVG(aprobacion) FROM ratings WHERE emp_id = $id");
    $sentencia->execute();
    $response = $sentencia->fetchAll();

    return floor($response[0][0]);
}

function obtener_empleados($post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;

    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS id,name, address FROM employees LIMIT $inicio,$post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function pagina_actual()
{
    return isset($_GET['p']) ? (int) $_GET['p'] : 1;
}


function numero_paginas($post_por_pagina, $conexion)
{
    $total_post = $conexion->prepare('SELECT count(FOUND_ROWS()) as total FROM employees');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);

    return $numero_paginas;
}

/*function obtener_post_por_id($id, $conexion)
{
    $resultado = $conexion->query("SELECT * FROM post WHERE post_id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();

    return ($resultado) ? $resultado : false;
}*/

/*function obtener_empleados($conexion){
    $sentencia = $conexion->prepare("SELECT id,name, address FROM employees");

    $sentencia->execute();
    return $sentencia->fetchAll();
}*/

function obtener_empleos($id, $conexion){
    $sentencia = $conexion->prepare("SELECT nombre FROM job as j INNER JOIN employee_job as ej ON (j.id = ej.job_id) WHERE ej.emp_id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_puntuacion($id, $conexion){
    $sentencia = $conexion->prepare("SELECT aprobacion from ratings as r INNER JOIN employees as em ON (em.id = r.emp_id) WHERE r.emp_id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function filtrar_puntuacion($puntuacion){
    $puntuacion_filtrada = array();
    $puntuacion_filtrada[0] = 0;
    $puntuacion_filtrada[1] = 0;
    for($i = 0; $i < sizeof($puntuacion); $i++){
        $puntuacion[$i][0] == 0 ? $puntuacion_filtrada[0] += 1 : $puntuacion_filtrada[1] += 1;  
    }

    return $puntuacion_filtrada;
}

function obtener_comentarios_por_id($id,$conexion)
{
    $sentencia = $conexion->prepare("SELECT c.*, u.usu_nombre FROM comentarios as c INNER JOIN usuario as u ON (c.usu_id = u.usu_id) WHERE post_id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();

}

function obtener_datos_usuario($id,$conexion){
    $sentencia = $conexion->prepare("SELECT name from employees WHERE id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function comprobar_usuario_empleado($email,$pass,$conexion){
    $sentencia = $conexion->prepare("SELECT name,id FROM employees WHERE email LIKE '$email' AND password LIKE '$pass'");
    $sentencia->execute();
    $sentencia = $sentencia->fetchAll();

    $user[0] = ISSET($sentencia[0]['name']) ? $sentencia[0]['name'] : null;
    $user[1] = ISSET($sentencia[0]['id']) ? $sentencia[0]['id'] : null;
    if(!empty($user[0])){
        return $user;
    }else{
        return false;
    }
}

function comprobar_usuario_empleador($email,$pass,$conexion){
    $sentencia = $conexion->prepare("SELECT name,id FROM employers WHERE email LIKE '$email' AND password LIKE '$pass'");
    $sentencia->execute();
    $sentencia = $sentencia->fetchAll();

    $user[0] = ISSET($sentencia[0]['name']) ? $sentencia[0]['name'] : null;
    $user[1] = ISSET($sentencia[0]['id']) ? $sentencia[0]['id'] : null;
    if(!empty($user[0])){
        return $user;
    }else{
        return false;
    }
}

function comprobar_correo($email, $conexion){
    $sentencia = $conexion->prepare("SELECT usu_correo FROM usuario WHERE usu_correo LIKE '$email'");
    $sentencia->execute();
    $sentencia = $sentencia->fetchAll();

    $correo =  ISSET($sentencia[0]['usu_correo']) ? $sentencia[0]['usu_correo'] : null;
    if($correo != null){
        return true;
    }else{
        return false;
    }
}

function crear_empleado($nombre, $correo, $pass1,$phone_number,$birthdate,$address,$photo, $conexion){

    $statement = $conexion->prepare("INSERT INTO employees (id,name,email,password,phone_number,birthdate, address, register_date, photo, active) VALUES (NULL,:nombre,:email,:pass,:phone_number,:birthdate,:direccion,NOW(),:photo,1)");

    $statement->execute(array(':nombre' => $nombre, ':email' => $correo , ':pass' => $pass1,':phone_number' => $phone_number, ':birthdate' => $birthdate, ':direccion' => $address, ':photo' => $photo));

    $usuario = comprobar_usuario_empleador($correo, $pass1, $conexion);

    if(!empty($usuario)){
        return $usuario;
    }else{
        return false;
    }
}


function asignar_oficios($id_oficios, $desc_oficios,$usu_id, $conexion){
    
    for($i = 0; $i < count($id_oficios); $i++){
        $statement = $conexion->prepare("INSERT INTO employee_job (emp_id,job_id,descripcion) VALUES (:emp_id,:job_id,:descr)");

        $statement->execute(array(':emp_id' => $usu_id,':job_id' => $id_oficios[$i],':descr' => $desc_oficios[$i] ));
    }
}


function obtener_oficios($conexion){
    $statement = $conexion->prepare("SELECT * FROM job");

    $statement->execute();

    return $statement->fetchAll();
}

function tiempo_transcurrido($tiempo)
{
    date_default_timezone_set('America/Mexico_City');
    $date1 = new DateTime($tiempo);
    $date2 = new DateTime("now");
    $diff = $date1->diff($date2);

    if($diff->y != 0){
        return $diff->y > 1 ? 'Publicado hace '. $diff->y .' años' : 'Publicado hace '. $diff->y .' año';
    }

    if($diff->m != 0){
        return $diff->m > 1 ? 'Publicado hace '. $diff->m .' meses' : 'Publicado hace '. $diff->m .' mes';
    }

    if($diff->d != 0){
        return $diff->d > 1 ? 'Publicado hace '. $diff->d .' dias' : 'Publicado hace '. $diff->d .' día';
    }

    if($diff->h != 0){
        return $diff->h > 1 ? 'Publicado hace '. $diff->h .' horas' : 'Publicado hace '. $diff->h .' hora';
    }

    if($diff->i != 0){
        return $diff->i > 1 ? 'Publicado hace '. $diff->i .' minutos' : 'Publicado hace '. $diff->i .' minuto';
    }

    if($diff->s != 0){
        return $diff->s > 1 ? 'Publicado hace '. $diff->s .' segundos' : 'Publicado hace '. $diff->s .' segundo';
    }
    
}


?>