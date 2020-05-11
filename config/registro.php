<?php

require 'config.php';
require 'funciones.php';


//Variables
$nombre;
$pass1;
$pass2;
$cp;
$direccion;
$desc_oficios = array();
$id_oficios = array();
$correo;
$tel;
$genero;
$fechaNac;
$conexion = conexion($bd_config);
$id = 0;

if (isset($_FILES['file']['name']) && isset($_FILES['file']['tmp_name'])) {

    $nombreImg = $_FILES['file']['name'];
    $ruta = $_FILES['file']['tmp_name'];
    $destino = '../' . $blog_config['carpeta_imagenes'] . $nombreImg;

    foreach ($_POST as $campo => $valor) {
        if($campo == strval($id)){
            array_push($id_oficios, limpiarDatos($valor));
            $id++;
        }else if ($campo == 'nombre') {
            $nombre = limpiarDatos($valor);
        } else if ($campo == 'contrasena1') {
            $pass1 = limpiarDatos($valor);
        } else if ($campo == 'contrasena2') {
            $pass2 = limpiarDatos($valor);
        } else if ($campo == 'CP') {
            $cp = limpiarDatos($valor);
        } else if ($campo == 'direccion') {
            $direccion = limpiarDatos($valor);
        } else if ($campo != 'nombre' && $campo != 'contrasena1' && $campo != 'contrasena2' && $campo != 'CP' && $campo != 'direccion' && $campo != 'tel' && $campo != 'correo' && $campo != 'fechaNac' && $campo != 'genero' && $campo != strval($id)) {
            array_push($desc_oficios, limpiarDatos($valor));
        } else if ($campo == 'fechaNac') {
            $fechaNac = limpiarDatos($valor);
        } else if ($campo == 'genero') {
            $genero = limpiarDatos($valor);
        } else if ($campo == 'correo') {
            $correo = limpiarDatos($valor);
        } else if ($campo == 'tel') {
            $tel = limpiarDatos($valor);
        }
    }

    if (copy($ruta, $destino)) {
        $usuario = crear_empleado($nombre, $correo, $pass1, $tel, $fechaNac, $direccion, $nombreImg, $conexion);
        asignar_oficios($id_oficios,$desc_oficios,$usuario[1],$conexion);

    }

    if(!$usuario){
        echo 'Error';
    }
    //print_r($oficios);

} else {
    echo '<script type="text/javascript"> alert("Faltan datos");';
} 


  //crear_empleado($nombre,$pass1,$);

  /*echo $pass1;
  echo '-';
  echo $pass2;
  echo '-';
  echo $cp;
  echo '-';
  echo $direccion;
  echo '-';
  print_r($oficios);
  echo '-';
  echo $genero;
  echo '-';
  echo $fechaNac;
  echo '-';
  echo $nombre;
  echo '-';
  echo $tel;
  echo '-';
  echo $correo;*/
