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
                    <form action="<?php echo RUTA . 'config/registro2.php'; ?>" enctype="multipart/form-data" method="POST" id="formulario" novalidate>
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
                                <input type="password" name="contraseña1" id="nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="contraseña2" class="col-form-label col-md-4">Confirmar contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="contraseña2" id="nombre" class="form-control" required>
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