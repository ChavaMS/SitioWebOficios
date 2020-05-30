<div class="container-fluid h-100 fondoWeb">
    <div class="row h-100">
        <div class="col-12 col-md-2">

        </div>
        <div class="col-12 col-md-3 p-0 d-md-flex align-items-center">
            <div class="h-75 border-right w-100 bg-light redondearOpcionIzquierda">
                <div class="h-25 w-100 text-center mt-2">
                    <span class="display-4">Empleado</span>
                </div>
                <div class="w-100">
                    <a class="nav-link p-3 my-2 pestana text-dark" onclick="cambiar('1e')">Información personal</a>
                    <a class="nav-link p-3 my-2 pestana text-dark" onclick="cambiar('2e')">Ubicación</a>
                    <a class="nav-link p-3 my-2 pestana text-dark" onclick="cambiar('3e')">Oficios</a>
                    <a class="nav-link p-3 my-2 pestana text-dark" onclick="cambiar('4e')">Contacto</a>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-5 p-0 d-flex align-items-center">
            <div class="h-75 w-100 bg-light d-flex align-items-center redondearOpcionDerecha">
                <div id="1e" class="p-4">
                    <div class="text-left">
                        <span>Información personal</span>
                        <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-4">Nombre:</label>
                        <div class="col-md-8">
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $empleado[0]['name']; ?>" required>
                        </div>
                    </div>
                    <!--NOMBRE-->

                    <!--CONTRASEÑA-->
                    <div class="row form-group">
                        <label for="contraseña1" class="col-form-label col-md-4">Contraseña:</label>
                        <div class="col-md-8">
                            <input type="password" name="contrasena1" id="pass1" class="form-control" value="<?php echo $empleado[0]['password']; ?>" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                        <div class="col-md-8">
                            <input type="password" name="contrasena2" id="pass2" class="form-control" value="<?php echo $empleado[0]['password'];?>" required>
                        </div>
                    </div>
                    <!--CONTRASEÑA-->
                    <input class="btn btn-secondary" type="submit" value="Guardar">
                </div>
                <div id="2e" class="p-4 d-none">
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
                    <input class="btn btn-info" type="submit" value="Guardar">
                </div>
                <div id="3e" class="p-4 d-none">
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
                    <input class="btn btn-info" type="submit" value="Guardar">

                </div>
                <div id="4e" class="p-0 d-none">
                    <div class="text-left mx-3">
                        <span>Contacto</span>
                        <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                    </div>
                    <div class="row form-group mx-3">
                        <label for="tel" class="col-form-label col-md-4 my-2">Teléfono:</label>
                        <div class="col-md-8 my-2">
                            <input type="tel" name="tel" id="tel" value="<?php echo $empleado[0]['phone_number']; ?>" class="form-control" required>
                        </div>
                        <label for="correo" class="col-form-label col-md-4 my-2">Correo:</label>
                        <div class="col-md-8 my-2">
                            <input type="email" name="correo" id="correo" value="<?php echo $empleado[0]['email']; ?>" class="form-control" required>
                        </div>
                        <label for="file" class="col-form-label col-md-4 my-2">Imagen de perfil:</label>
                        <div class="col-md-8 my-2">
                            <input type="file" name="file" id="file" class="form-control-file" required>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-8 my-2" id="preview">
                            <!-- Se coloca la imagen momentaneamente -->
                        </div>
                        <input class="btn btn-info" type="submit" value="Guardar">
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-2">

            </div>
        </div>
    </div>