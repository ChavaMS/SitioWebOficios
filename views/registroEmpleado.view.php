<div class="container-fluid h-100" style="background-image: url('img/oficio1.jpg');">
  <div class="row h-100">
    <div class="col-md-3"></div>
    <div class="col-md-6 px-0 h-100">
      <div class="fondoBlanco redondear my-5 justify-content-center border d-flex align-items-center">
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
                  <input type="password" name="contrasena1" id="pass1" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                <div class="col-md-8">
                  <input type="password" name="contrasena2" id="pass2" class="form-control" required>
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
              <div>
                <button class="next btn btn-secondary mb-2" type="button">Siguiente</button>
              </div>
            </fieldset>
            <!----------------------------------PARTE 2------------------------------------------------->
            <fieldset>
              <!--UBICACION-->
              <div class="text-center display-4 mb-3">
                <span>Empleado</span>
              </div>
              <div class="text-left">
                <span>Ubicación</span>
                <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
              </div>
              <div class="row form-group">
                <label for="pais" class="col-form-label col-md-4">País:</label>
                <div class="col-md-8">
                  <input type="text" name="pais" id="pais" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="estado" class="col-form-label col-md-4">Estado:</label>
                <div class="col-md-8">
                  <input type="text" name="estado" id="estado" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="ciudad" class="col-form-label col-md-4">Ciudad:</label>
                <div class="col-md-8">
                  <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="calle" class="col-form-label col-md-4">Calle:</label>
                <div class="col-md-8">
                  <input type="text" name="calle" id="calle" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="colonia" class="col-form-label col-md-4">Colonia:</label>
                <div class="col-md-8">
                  <input type="text" name="colonia" id="colonia" class="form-control" required>
                </div>
              </div>
              <div class="row form-group">
                <label for="cp" class="col-form-label col-md-4">Codigo postal:</label>
                <div class="col-md-8">
                  <input type="text" name="cp" id="cp" class="form-control" required>
                </div>
              </div>
              <!--UBICACION-->
              <div>
                <button type="button" name="previous" class="previous btn btn-secondary" value="Previous">Regresar</button>
                <button class="next btn btn-secondary" type="button">Siguiente</button>
              </div>

            </fieldset>
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
                  <input type="button" class="btn btn-secondary form-control mx-2" onclick="agregar()" value="+">
                </div>
                <div class="col-md-3">
                  <input type="button" class="btn btn-secondary form-control mx-1" onclick="borrar()" value="-">
                </div>
              </div>
              <div id="padre">
                <!--OPCIONES DE OFICIOS-->
              </div>

              <div class=" mt-5">
                <button type="button" name="previous" class="previous btn btn-secondary" value="Previous">Regresar</button>
                <button class="next btn btn-secondary" type="button">Siguiente</button>
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
                <button type="button" name="previous" class="previous btn btn-secondary" value="Previous">Regresar</button>
                <input class="btn btn-secondary" type="submit" value="Finalizar">
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