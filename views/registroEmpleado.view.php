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

    #regiration_form fieldset:not(:first-of-type) {
      display: none;
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
          <a class="nav-link" href="inicarSesion.php">Iniciar sesión</a>
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
          <div class="d-block my-4">
            <form id="regiration_form" action="<?php echo RUTA . 'config/registro1.php'; ?>" enctype="multipart/form-data" method="POST">
              <!-----------------------novalidate-------------------PARTE 1------------------------------->
              <fieldset>
                <div class="text-center display-4 mb-3">
                  <span>Empleado</span>
                </div>
                <div class="text-left">
                  <span>Información personal</span>
                  <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                </div>
                <!--NOMBRE-->
                <div class="row form-group">
                  <label for="nombre" class="col-form-label col-md-4">Nombre:</label>
                  <div class="col-md-8">
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                  </div>
                </div>
                <!--NOMBRE-->

                <!--CONTRASEÑA-->
                <div class="row form-group">
                  <label for="contraseña1" class="col-form-label col-md-4">Contraseña:</label>
                  <div class="col-md-8">
                    <input type="text" name="contrasena1" id="pass1" class="form-control" required>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                  <div class="col-md-8">
                    <input type="text" name="contrasena2" id="pass2" class="form-control" required>
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
                <!--UBICACION-->
                <div class="text-left">
                  <span>Ubicación</span>
                  <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                </div>
                <div class="row form-group">
                  <label for="nombre" class="col-form-label col-md-4">Codigo postal:</label>
                  <div class="col-md-8">
                    <input type="text" name="CP" id="nombre" class="form-control" required>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="nombre" class="col-form-label col-md-4">Colonia:</label>
                  <div class="col-md-8">
                    <select name="direccion" id="" class="form-control">
                      <option value="Colonia 1">Colonia 1</option>
                      <option value="Colonia 2">Colonia 2</option>
                      <option value="Colonia 3">Colonia 3</option>
                      <option value="Colonia 4">Colonia 4</option>
                    </select>
                  </div>
                </div>
                <!--UBICACION-->
                <div>
                  <button class="next btn btn-info mb-2" type="button">Siguiente</button>
                </div>

              </fieldset>
              <!----------------------------------PARTE 2------------------------------------------------->
              <fieldset>
                <div class="text-center display-4 mb-3">
                  <span>Empleado</span>
                </div>
                <div class="text-left">
                  <span>Oficios</span>
                  <img class="d-block mb-2 w-50 mb-2" src="img/linea.jpg" alt="">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-2">
                      <select id="nombreOficios" class="form-control">
                        <?php foreach ($oficios as $oficio) : ?>
                            <option value="<?php echo $oficio[0]; ?>"><?php echo $oficio[1]; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <input type="button" class="btn btn-primary form-control mx-2" onclick="agregar()" value="+">
                  </div>
                  <div class="col-md-3">
                    <input type="button" class="btn btn-primary form-control mx-1" onclick="borrar()" value="-">
                  </div>
                </div>
                <div id="padre">
                  <!--OPCIONES DE OFICIOS-->
                </div>

                <div class="ml-5 mt-5">
                  <button type="button" name="previous" class="previous btn btn-info" value="Previous">Regresar</button>
                  <button class="next btn btn-info" type="button">Siguiente</button>
                </div>
              </fieldset>
              <!--------------------------------------------PARTE 3------------------------------------------->
              <fieldset>
                <div class="text-center display-4 mb-3">
                  <span>Empleado</span>
                </div>
                <div class="text-left mx-5">
                  <span>Contacto</span>
                  <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                </div>
                <div class="row form-group mx-5">
                  <label for="nombre" class="col-form-label col-md-4 my-2">Teléfono:</label>
                  <div class="col-md-8 my-2">
                    <input type="tel" name="tel" id="tel" class="form-control" required>
                  </div>
                  <label for="nombre" class="col-form-label col-md-4 my-2">Correo:</label>
                  <div class="col-md-8 my-2">
                    <input type="email" name="correo" id="correo" class="form-control" required>
                  </div>
                  <label for="nombre" class="col-form-label col-md-4 my-2">Imagen de perfil:</label>
                  <div class="col-md-8 my-2">
                    <input type="file" name="file" id="file" class="form-control-file" required>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-8 my-2" id="preview">
                    <!-- Se coloca la imagen momentaneamente -->
                  </div>
                </div>
                <div class="ml-5">
                  <button type="button" name="previous" class="previous btn btn-info" value="Previous">Regresar</button>
                  <input class="btn btn-info" type="submit" value="Finalizar">
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
      <!---->
      <div class="col-md-3"></div>
    </div>
  </div>