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

function obtener_id_empleados($inicio, $post_por_pagina, $conexion)
{
    $sentencia = $conexion->prepare("SELECT id FROM employees LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();

    return $sentencia->fetchAll();;
}

function obtener_rating($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT AVG(aprobacion) FROM ratings WHERE employee_id = $id");
    $sentencia->execute();
    $response = $sentencia->fetchAll();

    return ($response[0][0]);
}

function obtener_empleados($post_por_pagina, $ciudad, $estado, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;

    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS id,name, lat,lon, schedule FROM employees WHERE city = :ciudad AND state = :estado LIMIT $inicio,$post_por_pagina");
    $sentencia->execute(array(':ciudad' => $ciudad, ':estado' => $estado));
    return $sentencia->fetchAll();
}

function pagina_actual()
{
    return isset($_GET['p']) ? (int) $_GET['p'] : 1;
}


function numero_paginas($post_por_pagina, $ciudad, $estado, $conexion)
{
    $total_post = $conexion->prepare('SELECT count(FOUND_ROWS()) as total FROM employees WHERE city = :ciudad AND state = :estado');
    $total_post->execute(array(':ciudad' => $ciudad, ':estado' => $estado));
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);

    return $numero_paginas;
}

function obtener_empleado_completo($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT * from employees WHERE id = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function crear_empleador($nombre, $correo, $pass1, $fechaNac, $conexion)
{
    $statement = $conexion->prepare("INSERT INTO employers (id,name,email,password,register_date, active) VALUES (NULL,:nombre,:email,:pass,NOW(),1)");
    $statement->execute(array(':nombre' => $nombre, ':email' => $correo, ':pass' => $pass1));

    $usuario = comprobar_usuario_empleador($correo, $pass1, $conexion);

    $user[0] = isset($usuario[0]) ? $usuario[0] : null;
    $user[1] = isset($usuario[1]) ? $usuario[1] : null;

    if (!empty($user[0])) {
        return true;
    } else {
        return false;
    }
}

function insertar_comentario($idEmpleador, $idEmpleado, $idTrabajo, $mensaje, $conexion)
{
    $statement = $conexion->prepare("INSERT INTO comment (id,emp_id,emy_id,job_id,comments) VALUES (NULL,:emp_id,:emy_id,:job_id,:comments)");
    $statement->execute(array(':emp_id' => $idEmpleador, ':emy_id' => $idEmpleado, ':job_id' => $idTrabajo, ':comments' => $mensaje));
}

function obtener_empleos($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT nombre FROM job as j INNER JOIN employee_job as ej ON (j.id = ej.job_id) WHERE ej.emp_id = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_oficios_descripcion($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT descripcion FROM employee_job WHERE emp_id = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_comentarios($id_emp, $id_trabajo, $conexion)
{
    $sentencia = $conexion->prepare("SELECT co.emp_id,co.comments, emp.name AS 'nombre' FROM comment AS co INNER JOIN employers AS emp ON (emp.id = co.emp_id) WHERE co.emy_id = $id_emp AND co.job_id = $id_trabajo");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_id_trabajos($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT id FROM job AS j INNER JOIN employee_job AS emp_jo ON (j.id = emp_jo.job_id) WHERE emp_jo.emp_id = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


function obtener_puntuacion($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT aprobacion from ratings as r INNER JOIN employees as em ON (em.id = r.emp_id) WHERE r.emp_id = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function filtrar_puntuacion($puntuacion)
{
    $puntuacion_filtrada = array();
    $puntuacion_filtrada[0] = 0;
    $puntuacion_filtrada[1] = 0;
    for ($i = 0; $i < sizeof($puntuacion); $i++) {
        $puntuacion[$i][0] == 0 ? $puntuacion_filtrada[0] += 1 : $puntuacion_filtrada[1] += 1;
    }

    return $puntuacion_filtrada;
}

function obtener_comentarios_por_id($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT c.*, u.usu_nombre FROM comentarios as c INNER JOIN usuario as u ON (c.usu_id = u.usu_id) WHERE post_id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_datos_usuario($id, $conexion)
{
    $sentencia = $conexion->prepare("SELECT name, email, phone_number, birthdate, photo from employees WHERE id = $id");

    $sentencia->execute();
    return $sentencia->fetchAll();
}

function comprobar_usuario_empleado($email, $pass, $conexion)
{
    $sentencia = $conexion->prepare("SELECT name,id FROM employees WHERE email LIKE '$email' AND password LIKE '$pass'");
    $sentencia->execute();
    $sentencia = $sentencia->fetchAll();

    $user[0] = isset($sentencia[0]['name']) ? $sentencia[0]['name'] : null;
    $user[1] = isset($sentencia[0]['id']) ? $sentencia[0]['id'] : null;
    if (!empty($user[0])) {
        return $user;
    } else {
        return false;
    }
}

function comprobar_usuario_empleador($email, $pass, $conexion)
{
    $sentencia = $conexion->prepare("SELECT name,id FROM employers WHERE email LIKE '$email' AND password LIKE '$pass'");
    $sentencia->execute();
    $sentencia = $sentencia->fetchAll();

    $user[0] = isset($sentencia[0]['name']) ? $sentencia[0]['name'] : null;
    $user[1] = isset($sentencia[0]['id']) ? $sentencia[0]['id'] : null;
    if (!empty($user[0])) {
        return $user;
    } else {
        return false;
    }
}

function crear_empleado($nombre, $correo, $pass1, $phone_number, $birthdate, $lat, $lon, $pais, $estado, $ciudad, $turnos_string, $photo, $conexion)
{

    $statement = $conexion->prepare("INSERT INTO employees (id,name,email,password,phone_number,birthdate, lat, lon, city, state, country, schedule, register_date, photo, active) VALUES (NULL,:nombre,:email,:pass,:phone_number,:birthdate,:lat, :lon, :ciudad, :estado, :pais, :turnos,NOW(),:photo,1)");
    $statement->execute(array(':nombre' => $nombre, ':email' => $correo, ':pass' => $pass1, ':phone_number' => $phone_number, ':birthdate' => $birthdate, ':lat' => $lat, 'lon' => $lon, ':ciudad' => $ciudad, ':estado' => $estado, ':pais' => $pais, ':turnos' => $turnos_string, ':photo' => $photo));

    $usuario = comprobar_usuario_empleado($correo, $pass1, $conexion);

    $user[0] = isset($usuario[0]) ? $usuario[0] : null;
    $user[1] = isset($usuario[1]) ? $usuario[1] : null;

    if (!empty($user[0])) {
        return $user;
    } else {
        return false;
    }
}



function obtener_oficios($conexion)
{
    $statement = $conexion->prepare("SELECT * FROM job");
    $statement->execute();

    return $statement->fetchAll();
}

function obtener_oficios_empleado($id, $conexion)
{
    $statement = $conexion->prepare("SELECT * FROM employee_job  WHERE emp_id = $id");
    $statement->execute();

    return $statement->fetchAll();
}

function obtener_nombre_oficio($id_oficio, $conexion)
{
    $statement = $conexion->prepare("SELECT nombre FROM job WHERE id = $id_oficio");
    $statement->execute();

    return $statement->fetchAll();
}

function obtener_oficios_disponibles($id, $conexion)
{
    $statement = $conexion->prepare("SELECT j.id, j.nombre FROM job AS j WHERE j.id NOT IN (SELECT job_id FROM employee_job WHERE emp_id = :empId); ");
    $statement->execute(array(':empId' => $id));

    return $statement->fetchAll();
}

function obtener_empleados_por_busqueda($post_por_pagina, $busqueda, $turnos_string, $ciudad, $estado, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;

    $sentencia = $conexion->prepare("SELECT DISTINCT SQL_CALC_FOUND_ROWS emp.id, emp.name, emp.lat, emp.lon, emp.schedule FROM employees AS emp INNER JOIN employee_job AS ej ON (emp.id = ej.emp_id) INNER JOIN job AS j ON (j.id = ej.job_id) WHERE emp.city = '$ciudad' AND emp.state = '$estado' AND emp.schedule LIKE '%$turnos_string%' AND (j.nombre LIKE '%$busqueda%' OR emp.name LIKE '%$busqueda%') LIMIT $inicio, $post_por_pagina;");
    $sentencia->execute();

    return $sentencia->fetchAll();
}

//UBICACION
function obtener_coordenadas($id, $conexion)
{
    $statement = $conexion->prepare("SELECT lat, lon FROM employees WHERE id = :empId ");
    $statement->execute(array(':empId' => $id));

    return $statement->fetchAll()[0];
}

function obtener_coordenada_unica($id, $conexion)
{
    $statement = $conexion->prepare("SELECT lat, lon FROM employees WHERE id = :empId ");
    $statement->execute(array(':empId' => $id));

    return $statement->fetchAll();
}

//CALCULOS
function obtener_distancia($lat1, $lon1, $lat2, $lon2)
{
    $origin = $lat1 . ',' . $lon1;
    $destination = $lat2 . ',' . $lon2;

    //Geolocalizacion
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=km&origins=' . $origin . '&destinations=' . $destination . '&key=AIzaSyDgRN1AR5CnGjgdcc3f93CzMho80a2yWog');
    $datos = json_decode($geocode);
    $res[0] = $datos->rows[0]->elements[0]->distance->text;
    $res[1] = $datos->rows[0]->elements[0]->distance->value;
    return $res;
}
//INFO_EMPLEADOR
function obtener_info_empleador($id, $conexion)
{
    $statement = $conexion->prepare("SELECT name, email, password FROM employers WHERE id = :id");
    $statement->execute(array(':id' => $id));

    return $statement->fetchAll();
}

//----------------------UPDATES-------------------------------------
function actualizar_oficios($descripcion, $oficio, $idEmpleado, $conexion)
{
    $statement = $conexion->prepare("UPDATE employee_job SET descripcion = :descr WHERE emp_id = :idEmp AND job_id = :jobId");
    $statement->execute(array(':idEmp' => $idEmpleado, ':jobId' => $oficio, ':descr' => $descripcion));
}

function actualizar_info_personal($nombre, $pass, $idEmp, $conexion)
{
    $statement = $conexion->prepare("UPDATE employees SET name = :nombre, password = :pass  WHERE id = :idEmp");
    $statement->execute(array(':idEmp' => $idEmp, ':pass' => $pass, ':nombre' => $nombre));
}

function actualizar_datos_contacto($tel, $correo, $idEmp, $conexion)
{
    $statement = $conexion->prepare("UPDATE employees SET email = :correo, phone_number = :tel  WHERE id = :idEmp");
    $statement->execute(array(':idEmp' => $idEmp, ':tel' => $tel, ':correo' => $correo));
}

function actualiza_imagen($imagen, $idEmp, $conexion)
{
    $statement = $conexion->prepare("UPDATE employees SET photo = :foto WHERE id = :idEmp");
    $statement->execute(array(':idEmp' => $idEmp, ':foto' => $imagen));
}

function actualizar_empleador($nombre, $correo, $pass, $idEmp, $conexion)
{
    $statement = $conexion->prepare("UPDATE employers SET name = :nombre, password = :pass, email = :email  WHERE id = :idEmp");
    $statement->execute(array(':idEmp' => $idEmp, ':pass' => $pass, ':nombre' => $nombre, ':email' => $correo));
}

function actualizar_calificacion($rating, $idEmpleado, $idEmpleador, $conexion)
{
    $statement = $conexion->prepare("UPDATE ratings SET aprobacion = :aprob WHERE employee_id = :employee_id AND employers_id = :employers_id");
    $statement->execute(array(':aprob' => $rating, ':employee_id' => $idEmpleado, ':employers_id' => $idEmpleador));
}

function actualzar_ubicacion($lat, $lon, $pais, $estado, $ciudad, $idEmpleado, $conexion)
{
    $statement = $conexion->prepare("UPDATE employees SET lat = :lat, lon = :lon, city = :city, state = :state, country = :country WHERE id = :id");
    $statement->execute(array(':lat' => $lat, ':lon' => $lon, ':city' => $ciudad, ':state' => $estado, ':country' => $pais, ':id' => $idEmpleado));
}

//---------------------ELIMINAR---------------------------------
function eliminar_oficio($oficio, $id, $conexion)
{
    $statement = $conexion->prepare("DELETE FROM employee_job WHERE emp_id = :idEmp AND job_id = :jobID");
    $statement->execute(array(':idEmp' => $id, ':jobID' => $oficio));

    //Borramos sus comentarios
    $statement = $conexion->prepare("DELETE FROM comment WHERE emp_id = :idEmp AND job_id = :jobID");
    $statement->execute(array(':idEmp' => $id, ':jobID' => $oficio));
}

//---------------------INSERTAR----------------------------------
//OFICIOS
function asignar_oficios($id_oficios, $desc_oficios, $usu_id, $conexion)
{

    for ($i = 0; $i < count($id_oficios); $i++) {
        $statement = $conexion->prepare("INSERT INTO employee_job (emp_id,job_id,descripcion) VALUES (:emp_id,:job_id,:descr)");
        $statement->execute(array(':emp_id' => $usu_id, ':job_id' => $id_oficios[$i], ':descr' => $desc_oficios[$i]));
    }
}

//RATING
function agregar_calificacion($rating, $idEmpleado, $idEmpleador, $conexion)
{
    $statement = $conexion->prepare("INSERT INTO ratings (employers_id,employee_id, aprobacion) VALUES (:employer_id,:employee_id,:aprobacion)");
    $statement->execute(array(':employer_id' => $idEmpleador, ':employee_id' => $idEmpleado, ':aprobacion' => $rating));
}

//---------------------------CONSULTAS------------------------------
function numero_paginas_busqueda($post_por_pagina, $busqueda, $turnos_string, $ciudad, $estado, $conexion)
{

    $total_post = $conexion->prepare("SELECT DISTINCT COUNT(FOUND_ROWS()) as total FROM employees AS emp INNER JOIN employee_job AS ej ON (emp.id = ej.emp_id) INNER JOIN job AS j ON (j.id = ej.job_id) WHERE emp.city = '$ciudad' AND emp.state = '$estado' AND emp.schedule LIKE '%$turnos_string%' AND (j.nombre LIKE '%$busqueda%' OR emp.name LIKE '%$busqueda%');");
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);

    return $numero_paginas;
}


//-------------------------------COMPROBACIONES----------------------
function comprobar_correo($correo, $conexion)
{
    $sentencia = $conexion->prepare("SELECT COUNT(*) FROM employees WHERE email LIKE :correo");
    $sentencia->execute(array(':correo' => $correo));
    $sentencia = $sentencia->fetchAll();

    if ($sentencia[0][0] > 0) {
        return false;
    } else {
        return true;
    }
}

function comprobar_rating($idEmpleado, $idEmpleador, $conexion)
{
    $sentencia = $conexion->prepare("SELECT COUNT(*) FROM ratings WHERE employers_id = :employers_id AND employee_id = :employee_id");
    $sentencia->execute(array(':employee_id' => $idEmpleado, ':employers_id' => $idEmpleador));
    $sentencia = $sentencia->fetchAll();

    if ($sentencia[0][0] > 0) {
        return false;
    } else {
        return true;
    }
}

function tiempo_transcurrido($tiempo)
{
    date_default_timezone_set('America/Mexico_City');
    $date1 = new DateTime($tiempo);
    $date2 = new DateTime("now");
    $diff = $date1->diff($date2);

    if ($diff->y != 0) {
        return $diff->y > 1 ? 'Publicado hace ' . $diff->y . ' años' : 'Publicado hace ' . $diff->y . ' año';
    }

    if ($diff->m != 0) {
        return $diff->m > 1 ? 'Publicado hace ' . $diff->m . ' meses' : 'Publicado hace ' . $diff->m . ' mes';
    }

    if ($diff->d != 0) {
        return $diff->d > 1 ? 'Publicado hace ' . $diff->d . ' dias' : 'Publicado hace ' . $diff->d . ' día';
    }

    if ($diff->h != 0) {
        return $diff->h > 1 ? 'Publicado hace ' . $diff->h . ' horas' : 'Publicado hace ' . $diff->h . ' hora';
    }

    if ($diff->i != 0) {
        return $diff->i > 1 ? 'Publicado hace ' . $diff->i . ' minutos' : 'Publicado hace ' . $diff->i . ' minuto';
    }

    if ($diff->s != 0) {
        return $diff->s > 1 ? 'Publicado hace ' . $diff->s . ' segundos' : 'Publicado hace ' . $diff->s . ' segundo';
    }
}
