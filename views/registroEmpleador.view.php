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
        .letra1 {
            font-size: 1.5em;
        }

        html,
        body {
            height: 90%;
        }

        .clic {
            cursor: pointer;
        }

        .clic :hover {
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
            <div class="col-md-6 px-0 h-100">
                <div class="my-5 justify-content-center border d-flex align-items-center">
                    <div class="d-block ">
                        <div class="text-center display-4 mb-3">
                            <span>Empleador</span>
                        </div>
                        <div class="text-left">
                            <span>Información personal</span>
                            <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                        </div>
                        <form action="http://localhost/SitioWebOficios/config/registro2.php" enctype="multipart/form-data" method="POST" id="formulario" novalidate>
                            <!--NOMBRE-->
                            <div class="row form-group">
                                <label for="nombre" class="col-form-label col-md-4">Nombre:</label>
                                <div class="col-md-8">
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <label for="correo" class="col-form-label col-md-4 my-2">Correo:</label>
                                <div class="col-md-8 my-2">
                                    <input type="email" name="correo" id="correo" class="form-control" required>
                                </div>
                            </div>
                            <!--NOMBRE-->

                            <!--CONTRASEÑA-->
                            <div class="row form-group">
                                <label for="contraseña1" class="col-form-label col-md-4">Contraseña:</label>
                                <div class="col-md-8">
                                    <input type="text" name="contraseña1" id="nombre" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                                <div class="col-md-8">
                                    <input type="text" name="contraseña2" id="nombre" class="form-control" required>
                                </div>
                            </div>
                            <!--CONTRASEÑA-->

                            <!--FECHA DE NACIMIENTO-->
                            <div class="row form-group">
                                <label for="color" class="col-form-label col-md col-md-4">Fecha de nacimiento:</label>
                                <div class="col-md-8">
                                    <input type="date" name="fechaNac" class="form-control">
                                </div>
                            </div>
                            <!--FECHA DE NACIMIENTO-->
                            <!--GENERO-->
                            <div class="row form-group">
                                <label for="" class="col-form-label col-md-4">Genero:</label>
                                <div class="col-md-8 form-check form-check-inline m-0 pl-3">
                                    <label for="" class="form-check-label">
                                        <input type="radio" class="form-check-input" name="genero" value="hombre">
                                        Hombre
                                    </label>
                                    <label for="genero" class="form-check-label ml-2">
                                        <input type="radio" class="form-check-input" name="genero" value="mujer">
                                        Mujer
                                    </label>
                                </div>
                            </div>
                            <!--GENERO-->

                            <button class="btn btn-info mb-3" type="submit">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>