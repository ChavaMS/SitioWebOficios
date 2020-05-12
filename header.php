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

    <title>Nombre de empresa</title>
</head>

<body class="fondoAzul">
    <div id="particles-js"></div>

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
                    <a class="nav-link d-none" id="usuario" href="perfil.php?id=<?php echo $_SESSION['id']?>">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="initSesion" href="iniciarSesion.php">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cerrarSesion" onclick="cerrarSesion()" href="">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--NAVBAR-->