<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8 fondo">
            <!--NAV-->
            <nav class="navbar navbar-expand-lg navbar-light border">
                <div class="row" style="width: 100%;">
                    <div class="col-6 d-flex justify-content-end">
                        <div class="dropdown">

                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Busqueda avanzada
                            </button>
                            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                <!--SECCION 1-->
                                <div class="dropdown-item">

                                    <input type="checkbox" name="" id="">
                                    <span>Matutino</span>
                                </div>

                                <div class="dropdown-item">

                                    <input type="checkbox" name="" id="">
                                    <span>Vespertino</span>
                                </div>

                                <div class="dropdown-item">
                                    <input type="checkbox" name="" id="">
                                    <span>Nocturno</span>
                                </div>
                                <!--SECCION 1-->

                                <hr>

                                <!--SECCION 2-->
                                <div class="text-center">
                                    <span class="text-center">Ubicación</span>
                                </div>

                                <div class="dropdown-item">
                                    <input type="checkbox" name="" id="">
                                    <span>Automática</span>
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Estado</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Ciudad</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">País</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <!--SECCION 2-->

                                <hr>

                                <!--SECCION 3-->
                                <div class="text-center">
                                    <span class="text-center">Orden</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <i class="fas fa-sort-amount-up-alt p-1 d-block"></i>
                                        <i class="fas fa-sort-amount-up-alt p-1 d-block"></i>

                                    </div>
                                    <div class="col-md-6 text-left m-0 p-0">
                                        <span class="">Calificacón</span>
                                        <span class="">Contactos</span>
                                    </div>
                                    <!--<div class="text-center">
                                        <i class="fas fa-sort-amount-up-alt mr-1"></i>
                                        <span>Calificacón</span>
                                    </div>
                                    <div class="text-center">
                                        <i class="fas fa-sort-amount-up-alt mr-1"></i>
                                        <span>Contactos</span>
                                    </div>-->
                                </div>
                                <!--SECCION 3-->
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-start">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                    </div>
                </div>
            </nav>
            <!--NAV-->


            <div class="border p-2" style="width: 100%;">
                <?php foreach ($usuarios as $usuario) : ?>
                    <div class="card border-dark my-2" style="width: 100%;">
                        <div class="card-header"><?php echo $usuario['name'] ?></div>
                        <div class="card-body text-dark">
                            <div class="row text-center">
                                <div class="col-12 col-md-4">
                                    <p class="text-left pb-0 mb-0">Oficios:</p>
                                    <ul>
                                        <?php
                                        for ($i = 0; $i < sizeof($oficios[$NumOfic]); $i++) {
                                            echo "<li class='text-left' >" . $oficios[$NumOfic][$i][0] . '</li>';
                                        }
                                        $NumOfic++;
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-4">
                                    <?php echo $usuario['address'] ?>
                                </div>
                                <div class="col-12 col-md-4">
                                    <!--<div class="starrr" id="starrr">
                                    <span><?php //echo $puntuacion_filtrada[$j][0]; 
                                            ?></span>
                                    <i class="far fa-thumbs-down"></i>
                                    <span><?php //echo $puntuacion_filtrada[$j++][1]; 
                                            ?></span>
                                    <i class="far fa-thumbs-up"></i>
                                </div>-->
                                    <div id="rate<?php echo $j++; ?>" class="d-md-flex justify-content-center">
                                        <span class="mt-3 mx-2">Calificación:</span>
                                        <!--<div class="rate mt-3"></div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- PAGINACION -->
                <div class="mt-3 d-md-flex justify-content-center">
                    <?php require 'paginacion.php'; ?>
                </div>
            </div>

        </div>

        <div class="col-2">

        </div>
    </div>
</div>