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

    <title>Nombre de empresa</title>
</head>

<!--<body class="fondoAzul"-->

<body style="background-color: #343a40">
    <!--<div id="particles-js"></div>-->

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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