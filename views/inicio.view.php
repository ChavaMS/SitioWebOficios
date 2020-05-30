<div class="container-fluid fondoWeb">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-12 col-md-8 fondo">
            <!--NAV-->
            <nav class="navbar navbar-expand-lg navbar-light border">
                <div class="row" style="width: 100%;">
                    <div class="col-12 col-md-4 my-1 d-flex justify-content-center">
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
                                </div>
                                <!--SECCION 3-->
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex justify-content-center my-1">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 my-1">
                        <div class="d-md-flex justify-content-start">
                            <div class="form-inline d-sm-flex justify-content-center">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
            <!--NAV-->


            <div class="border p-2" style="width: 100%;">
                <input class="d-none" type="text" value="<?php echo sizeof($usuarios); ?>" id="numUsuarios">
                <?php foreach ($usuarios as $usuario) : ?>
                    <div class="card border-dark my-2 cardMod" id="<?php echo '_' . $id++; ?>">
                        <input type="text" class="d-none" value="<?php echo $usuario['id']; ?>">
                        <div class="progress">
                            <div class="progress-bar <?php echo $color[rand(0, 3)]; ?>" role="progressbar" style="width:<?php echo $tamano[rand(0, 9)] . "%;"; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
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
                                    <div id="rate<?php echo $j++; ?>" class="d-md-flex justify-content-center">
                                        <span class="mt-3 mx-2">Calificación:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- PAGINACION -->
                <div class="mt-3 d-flex justify-content-center">
                    <?php require 'paginacion.php'; ?>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-2">

        </div>
    </div>
</div>