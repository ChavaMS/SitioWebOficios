<div class="container-fluid h-100" style="background-image: url('img/oficio1.jpg');">
    <div class="row h-100">
        <div class="col-md-3"></div>
        <div class="col-md-6 px-0 h-100">
            <div class="fondoBlanco redondear my-5 justify-content-center border d-flex align-items-center">
                <div class="d-block ">
                    <div class="text-center display-4 mb-3">
                        <span>Empleador</span>
                    </div>
                    <div class="text-left">
                        <span>Información personal</span>
                        <img class="d-block mb-2 w-50" src="img/linea.jpg" alt="">
                    </div>
                    <form action="config/editarPerfil.php" enctype="multipart/form-data" method="POST" id="formulario" novalidate>
                        <!--NOMBRE-->
                        <div class="row form-group">
                            <label for="nombre" class="col-form-label col-md-4">Nombre:</label>
                            <div class="col-md-8">
                                <input type="text" value="true" name="perfilEmpleador" class="d-none">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $empleador[0][0]; ?>" required>
                            </div>
                            <label for="correo" class="col-form-label col-md-4 my-2">Correo:</label>
                            <div class="col-md-8 my-2">
                                <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $empleador[0][1]; ?>" required>
                            </div>
                        </div>
                        <!--NOMBRE-->

                        <!--CONTRASEÑA-->
                        <div class="row form-group">
                            <label for="contraseña1" class="col-form-label col-md-4">Contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="contrasena1" id="nombre" value="<?php echo $empleador[0][2]; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="contrasena2" id="pass" value="<?php echo $empleador[0][2]; ?>" class="form-control" required>
                            </div>
                        </div>
                        <!--CONTRASEÑA-->
                        <button class="btn btn-info mb-3" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>