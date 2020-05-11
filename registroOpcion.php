<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">

    <!--FONTAWESOME-->
    <link rel="stylesheet" href="Utilidades/fontawesome/css/all.css">
    <style>
      .letra1{
        font-size: 1.5em;
      }

      html, body { height: 90%; }

      .clic{
        cursor: pointer;
      }

      .clic :hover{
        background: #E0E0E0;
        transition: 100ms;
      }
    </style>
    <title>Nombre de empresa</title>
  </head>
  <body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light navBarColor">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="iniciarSesion.php">Iniciar sesión</a>
            </li>
          </ul>
        </div>
      </nav>
    <!--NAVBAR-->

    <div class="container-fluid h-100">
        <div class="row h-100">
          <div class="col-md-3"></div>
          <div class="col-md-3 px-0 h-100 clic" onclick="empleado()" >
            <div class="my-5 justify-content-center border h-100 d-flex align-items-center" >
              <div class="d-block  text-center ">
                <span class="display-4 d-block ">Empleado</span>
                <span class="text-muted letra1">¿Buscas trabajo?</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 px-0 h-100 clic" onclick="empleador()" >
            <div class="my-5 justify-content-center border h-100 d-flex align-items-center" >
              <div class="d-block  text-center">
                <span class="display-4 d-block">Empleador</span>
                <span class="text-muted letra1">¿Necesitas un servicio?</span>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
    </div>

<?php require 'footer.php'; ?> 