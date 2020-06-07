<div class="container-fluid fondoWeb">
    <div class="row">
        <div class="col-md-2">
            <input class="d-none" id="usuaID" type="text" value="<?php echo $idUser; ?>">
        </div>
        <div class="col-12 col-md-8 border fondo">
            <div class="row">
                <div class="col-md-4 col-12">

                    <div class="card my-3" style="width: 100%;">
                        <img src="<?php echo $blog_config['carpeta_imagenes'] . $datosUser['photo']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text-center">
                                <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary mb-2">Contactar</button>
                                <button href="#" data-toggle="modal" data-target="#ubicacion" class="btn btn-secondary mb-2">Ver ubicación</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 ">

                    <div class="card border-light mt-3" style="width: 100%; height: 91.3%;">
                        <div class="m-3">
                            <div class="row">
                                <div class="col-6">
                                    <h3><?php echo $datosUser['name']; ?></h3>
                                    <h4>Oficios que realiza</h4>
                                </div>
                                <div class="col-6 text-right p-4">
                                    <div id="rate10" class="d-md-flex justify-content-center">
                                        <div class="align-self-center">
                                            <div class="d-block">
                                                <span class="mt-3 mx-2">Calificación:</span>
                                            </div>
                                            <div class="d-block">
                                                <?php for ($x = 0; $x < 5; $x++) { ?>
                                                    <?php if ($x < $rating) : ?>
                                                        <i id="<?php echo 'r' . $x; ?>" onclick="valorar(<?php echo ($x + 1); ?>)" onmouseover="efecto(<?php echo $x; ?>)" onmouseout="reset(<?php echo $rating; ?>)" class="fas fa-star fa-mod" aria-hidden="true"></i>
                                                    <?php else : ?>
                                                        <i id="<?php echo 'r' . $x; ?>" onclick="valorar(<?php echo ($x + 1); ?>)" onmouseover="efecto(<?php echo $x; ?>)" onmouseout="reset(<?php echo $rating; ?>)" class="far fa-star fa-mod" aria-hidden="true"></i>
                                                    <?php endif; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
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
                                    if ($i == 0) {
                                        echo '<p id="#' . ($i + 1) . '" class="mt-3">' . $oficios_desc[$i][0] . '</p>';
                                    } else {
                                        echo '<p id="#' . ($i + 1) . '" class="d-none mt-3">' . $oficios_desc[$i][0] . '</p>';
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--MODAL CONTACTAR-->
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
            <!--MODAL CONTACTAR-->
            <!-- MODAL UBICACION -->
            <div class="modal fade" id="ubicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="map" id="mapa"></div>
                            <div class="tex-left">
                                <p class="m-0" style="font-size: .7rem;">*La marca solo representa el centro del area donde se puede encontrar ubicado el empleado.</p>
                                <p class="m-0" style="font-size: .7rem;">*No representa su posición exacta.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL UBICACION -->
            <div class="text-left">
                <h2>Comentarios</h2>
            </div>

            <div class="m-1 mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <p>
                            <?php for ($i = 0; $i < ($numOficios); $i++) {
                                echo '<button id="##' . ($i + 1) . '" class="btn btn-secondary mr-1">' . $oficios_nombre[$i][0] . '</button>';
                                echo '<input class="d-none" id="####' . ($i + 1) . '" type="text" value="' . $id_trabajos[$i][0] . '" >';
                            } ?>
                        </p>
                    </div>

                    <div>
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse" id="comentario">
                    <div class="card card-body mb-3">
                        <div class="form-group">
                            <div id="error1" class="bg-danger text-light d-none">
                                <p class="ml-2">Inicie sesión primero</p>
                            </div>
                            <div id="error2" class="bg-danger text-light d-none">
                                <p class="ml-2">Un empleado no puede comentar sobre otro empleado</p>
                            </div>
                            <textarea class="form-control" id="mensaje" rows="3"></textarea>
                            <button onclick="agregarComentarios()" class="btn btn-secondary mt-2" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
                <?php

                for ($i = 0; $i < ($numOficios); $i++) {
                    if ($i == 0) {
                        echo '<input type="text" class="d-none" value="' . $id_trabajos[$i][0] . '">';
                        echo '<div class="" id="###' . ($i + 1) . '" >';
                    } else {
                        echo '<input type="text" class="d-none" value="' . $id_trabajos[$i][0] . '">';
                        echo '<div class="d-none" id="###' . ($i + 1) . '" >';
                    }
                    for ($j = 0; $j < sizeof($comments[$i]); $j++) {
                        echo '<div class="card card-body mb-3" >' . '<p class="p-0 mb-1">'.$comments[$i][$j][2].'</p><hr class="mt-0"><p>' . $comments[$i][$j][1] . '</p>' . '</div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>

        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>