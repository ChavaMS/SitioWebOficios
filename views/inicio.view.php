<div class="container-fluid fondoWeb">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-12 col-md-8 fondo">
            <!--NAV-->
            <form id="formBusqueda" onsubmit="revisarOpciones(event)" action="inicio.php?<?php echo 'p=1&ciudad=' . $_GET['ciudad'] . '&estado=' . $_GET['estado']; ?>" method="POST">
                <nav class="navbar navbar-expand-lg navbar-light border">
                    <input class="d-none" type="text" name="lat" id="lat" value="">
                    <input class="d-none" type="text" name="lon" id="lon" value="">
                    <div class="row" style="width: 100%;">
                        <div class="col-12 col-md-4 my-1 d-flex justify-content-center">
                            <div class="dropdown">
                                <input type="text" class="d-none" name="busqueda" value="true">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Busqueda avanzada
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                    <!--SECCION 1-->
                                    <div class="dropdown-item">
                                        <input type="checkbox" name="turno[]" id="mat" value="M">
                                        <span>Matutino</span>
                                    </div>
                                    <div class="dropdown-item">
                                        <input type="checkbox" name="turno[]" id="ves" value="V">
                                        <span>Vespertino</span>
                                    </div>
                                    <div class="dropdown-item">
                                        <input type="checkbox" name="turno[]" id="noc" value="N">
                                        <span>Nocturno</span>
                                    </div>
                                    <!--SECCION 1-->
                                    <hr>
                                    <!--SECCION 2-->
                                    <div class="text-center">
                                        <span class="text-center">Ubicación</span>
                                    </div>
                                    <div class="dropdown-item">
                                        <input type="checkbox" name="automatica" id="automatica">
                                        <span>Automática</span>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Calle</span>
                                        </div>
                                        <input type="text" class="form-control" id="calle" name="calle" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Colonia</span>
                                        </div>
                                        <input type="text" class="form-control" name="colonia" id="colonia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">CP</span>
                                        </div>
                                        <input type="text" class="form-control" name="cp" id="cp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <!--SECCION 2-->
                                    <hr>
                                    <!--SECCION 3-->
                                    <div class="text-center">
                                        <span class="text-center">Orden por ubicación</span>
                                    </div>
                                    <div class="clic">
                                        <div class="row mx-1">
                                            <!-- <div class="col-md-4 text-right m-0 p-0">
                                                <i class="fas fa-sort-amount-up-alt p-1 d-block"></i>
                                            </div> -->
                                            <div class="col-md-12 text-center m-0 p-0">
                                                <input type="checkbox" name="ordenarUbicacion" value="true">
                                                <!--<span onclick="ordenar()" class="">Ubicación</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--SECCION 3-->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="d-flex justify-content-center my-1">
                                <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Ingrese un nombre u oficio" aria-label="Search">
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
            </form>
            <!--NAV-->


            <div class="border p-2" style="width: 100%;">
                <input class="d-none" type="text" value="<?php echo sizeof($usuarios); ?>" id="numUsuarios">
                <?php foreach ($usuarios as $usuario) : ?>
                    <div class="card border-dark my-2 p-0" id="<?php echo '.' . $id; ?>">
                        <input type="text" class="d-none" id="<?php echo 'i' . $id; ?>" value="<?php echo $usuario['id']; ?>">
                        <div class="progress">
                            <div class="progress-bar <?php echo $color[rand(0, 3)]; ?>" role="progressbar" style="width:<?php echo $tamano[rand(0, 9)] . "%;"; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-header cardMod" id="<?php echo '_' . $id; ?>"><?php echo $usuario['name'] ?></div>
                        <div class="card-body text-dark pb-0">
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
                                    <p class="text-left pb-0 mb-0">Horarios:</p>
                                    <ul>
                                        <?php foreach ($turnos_array[$j] as $turn) : ?>
                                            <?php if ($turn == 'M') : ?>
                                                <li class="text-left"><?php echo 'Matutino'; ?></li>
                                            <?php elseif ($turn == 'V') : ?>
                                                <li class="text-left"><?php echo 'Vespertino'; ?></li>
                                            <?php elseif ($turn == 'N') : ?>
                                                <li class="text-left"><?php echo 'Nocturno'; ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="map" id="<?php echo '-' . $id++; ?>">

                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0" style="font-size: .85rem;">Distancia aproximada: <?php if ($distancias != null) {
                                                                                                                echo $distancias[$j][0];
                                                                                                            } else {
                                                                                                                echo 'Se necesitan mas datos';
                                                                                                            } ?></p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 d-flex justify-content-center">
                                    <div class="align-self-center">
                                        <div class="d-block">
                                            <span class="mt-3 mx-2">Calificación:</span>
                                        </div>
                                        <div class="d-block">
                                            <?php for ($x = 0; $x < 5; $x++) { ?>
                                                <?php if ($x < $rating[$j]) : ?>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                <?php else : ?>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                <?php endif; ?>
                                            <?php }
                                            $j++; ?>
                                        </div>
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