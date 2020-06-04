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
                    <form action="config/editarPerfil.php" method="POST">
                        <div class="text-left">
                            <input type="text" value="true" name="infoPers" class="d-none">
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
                                <input type="password" name="contrasena2" id="pass2" class="form-control" value="<?php echo $empleado[0]['password']; ?>" required>
                            </div>
                        </div>
                        <!--CONTRASEÑA-->
                        <input class="btn btn-secondary" type="submit" value="Guardar">
                    </form>
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
                        <div class="col-12">
                            <div class="mb-2">
                                <?php
                                for ($y = 0; $y < sizeof($oficios_empleado); $y++) {
                                    echo '
                                    <div class="row my-4" id="${id}">
                                        <div class="col-md-6" id="izquierda">
                                            <label disabled for="" class="col-form-label">' . $oficios_nombre[$y][0][0] . '</label>
                                        </div>
                                        <div class="col-md-6" id="derecha">
                                            <textarea disabled name="" cols="30" rows="2" class="form-control">' . $oficios_empleado[$y][2] . '</textarea>
                                        </div>
                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--                     <div id="padre">
                        OPCIONES DE OFICIOS
                    </div> -->
                    <input class="btn btn-secondary" data-toggle="modal" data-target="#editar" type="submit" value="Editar">
                    <input class="btn btn-secondary" data-toggle="modal" data-target="#eliminar" type="submit" value="Eliminar">
                    <input class="btn btn-secondary" data-toggle="modal" data-target="#agregar" type="submit" value="Agregar nuevo oficio">
                    <!-- MODALES -->
                    <!-- Modal -->
                    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/editarPerfil.php" method="POST">
                                        <?php
                                        echo '<input type="text" value="true" class="d-none" name="editar" >';

                                        for ($y = 0; $y < sizeof($oficios_empleado); $y++) {
                                            echo '
                                    <div class="row my-4">
                                        <div class="col-md-6" id="izquierda">
                                        <input type="text" name="' . ($y + 50) . '" class="d-none" value="' . $oficios_empleado[$y][1] . '">
                                            <label for="" class="col-form-label">' . $oficios_nombre[$y][0][0] . '</label>
                                        </div>
                                        <div class="col-md-6" id="derecha">
                                            <textarea name="' . ($y + 100) . '" cols="30" rows="2" class="form-control">' . $oficios_empleado[$y][2] . '</textarea>
                                        </div>
                                    </div>';
                                        }
                                        ?>
                                        <input class="btn btn-secondary" data-toggle="modal" data-target="#editar" type="submit" value="Guardar">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php

                                    for ($y = 0; $y < sizeof($oficios_empleado); $y++) {
                                        $iden = "ren" . $y;
                                        echo '
                                    <div class="row my-4" id="' . $iden . '">
                                        <div class="col-md-6" id="izquierda">
                                            <label for="" class="col-form-label">' . $oficios_nombre[$y][0][0] . '</label>
                                        </div>
                                        <div class="col-md-6" id="derecha">
                                            <input onclick="eliminar(' . $oficios_empleado[$y][1] . ',' . $iden . ')" type="button" class="btn btn-danger" value="Eliminar" >
                                        </div>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/editarPerfil.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-1">
                                                    <input type="text" class="d-none" name="agregarNuevo" value="true">
                                                    <select id="nombreOficios" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 p-1">
                                                <input type="button" class="btn btn-primary form-control mx-2" onclick="agregar()" value="+">
                                            </div>
                                            <div class="col-md-2 p-1">
                                                <input type="button" class="btn btn-primary form-control mx-1" onclick="borrar()" value="-">
                                            </div>
                                            <div class="col-md-2 p-1">
                                                <input type="submit" class="btn btn-primary form-control mx-0 p-0" value="Guardar">
                                            </div>
                                        </div>
                                        <div id="padre">
                                            <!--OPCIONES DE OFICIOS-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODALES -->
                </div>
                <div id="4e" class="p-0 d-none">
                    <form action="config/editarPerfil.php" method="POST" enctype="multipart/form-data">
                        <div class="text-left mx-3">
                            <span>Contacto</span>
                            <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                        </div>
                        <div class="row form-group mx-3">
                            <input type="text" value="true" name="contacto" class="d-none">
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
                                <input type="file" name="file" id="file" class="form-control-file">
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-8 my-2" id="preview">
                                <!-- Se coloca la imagen momentaneamente -->
                            </div>
                            <input class="btn btn-info" type="submit" value="Guardar">
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-12 col-md-2">

            </div>
        </div>
    </div>