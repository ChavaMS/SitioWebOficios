<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="css/estilos.css" type="text/css">

  <!--FONTAWESOME-->
  <link rel="stylesheet" href="Utilidades/fontawesome/css/all.css">
  <style>
    .letra1 {
      font-size: 1.5em;
    }

    html,
    body {
      height: 100%;
    }

    .clic {
      cursor: pointer;
    }

    .clic :hover {
      background: #D8D8D8;
      transition: 100ms;
    }
  </style>
  <title>Nombre de empresa</title>
</head>

<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <a class="navbar-brand" href="index.php">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active" id="home">
          <a class="nav-link" href="inicio.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown d-none" id="usuario">
          <a class="nav-link dropdown-toggle" href="#" id="nombreUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuarios
          </a>
          <div class="dropdown-menu" aria-labelledby="nombreUsuario">
            <a class="dropdown-item" href="perfil.php?id=<?php echo $_SESSION['id'] ?>">Ver perfil</a>
            <a class="dropdown-item" href="datosEmpleado.php?id=<?php echo $_SESSION['id'] ?>">Mis datos</a>
          </div>
        </li>
        <li class="nav-item" id="initSesion">
          <a class="nav-link" href="iniciarSesion.php">Iniciar sesión</a>
        </li>
        <li class="nav-item" id="cerrarSesion">
          <a class="nav-link" onclick="cerrarSesion()" href="#">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--NAVBAR-->

  <div style="background-image: url('img/oficio4.jpg');" class="container-fluid h-100">
    <div class="row h-100">
      <div class="col-md-3"></div>
      <div class="col-md-3 px-0 h-75" onclick="empleado()">
        <div class="h-100 clic">
          <div class="fondoBlanco redondearOpcionIzquierda my-5 justify-content-center border h-100 d-flex align-items-center">
            <div class="d-block  text-center">
              <span class="display-4 d-block ">Empleado</span>
              <span class="text-muted letra1">¿Buscas trabajo?</span>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-3 px-0 h-75" onclick="empleador()">
        <div class="h-100 clic">
          <div class="fondoBlanco redondearOpcionDerecha my-5 clic justify-content-center border h-100 d-flex align-items-center">
            <div class="d-block  text-center">
              <span class="display-4 d-block">Empleador</span>
              <span class="text-muted letra1">¿Necesitas un servicio?</span>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <?php require 'footer.php'; ?>