<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8 border fondo">
            <div class="row">
                <div class="col-4">

                    <div class="card my-3" style="width: 18rem;">
                        <img src="<?php echo $blog_config['carpeta_imagenes'] . $datosUser['photo']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">Edad</p>
                            <p class="card-text">Dirección</p>
                            <div class="text-center">
                                <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary">Contactar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 ">

                    <div class="card border-light mb-3" style="width: 100%; height: 100%;">
                        <div class="m-3">
                            <div class="row">
                                <div class="col-6">
                                    <h3><?php echo $datosUser['name']; ?></h3>
                                    <h4>Oficios que realiza</h4>
                                </div>
                                <div class="col-6 text-right p-4">
                                    <div id="rate10" class="d-md-flex justify-content-center">
                                        <span class="mt-3 mx-2">Calificación:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <button id="numOficios" class="d-none" value="<?php echo $numOficios; ?>"></button>
                            <div>
                                <?php for ($i = 0; $i < ($numOficios); $i++) {
                                    echo '<button id="' . ($i + 1) . '" class="btn btn-secondary mr-1">' . $oficios_nombre[$i][0] . '</button>';
                                } ?>
                            </div>
                            <div>
                                <?php for ($i = 0; $i < ($numOficios); $i++) {
                                    if($i == 0){
                                        echo '<p id="#' . ($i + 1) . '" class="mt-3">' . $oficios_desc[$i][0] . '</p>';
                                    }else{
                                        echo '<p id="#' . ($i + 1) . '" class="d-none mt-3">' . $oficios_desc[$i][0] . '</p>';
                                    }
                                    
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--MODAL-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Nombre: <?php echo $datosUser['name']; ?></p>
                            <p>Correo: <?php echo $datosUser['email']; ?></p>
                            <p>Tel: <?php echo $datosUser['phone_number']; ?></p>
                            <div class="d-inline">
                                <a class="text-dark" href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a class="text-dark" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--MODAL-->

            <div class="text-left">
                <h2>Comentarios</h2>
            </div>

            <div class="m-1 mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <p>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#oficio1" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 1
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#oficio2" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 2
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#oficio3" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 3
                            </button>
                        </p>
                    </div>

                    <div>
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="collapse" id="oficio1">
                    <div class="card card-body">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <div class="collapse" id="oficio2">
                    <div class="card card-body">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, magnam.</p>
                    </div>
                </div>

                <div class="collapse" id="oficio3">
                    <div class="card card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam blanditiis perspiciatis rem quia adipisci enim magnam iure nam, aspernatur nulla!</p>
                    </div>
                </div>

                <div class="collapse" id="comentario">
                    <div class="card card-body">
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button class="btn btn-secondary mt-2" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-2">

        </div>
    </div>
</div>