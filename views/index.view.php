<div class="fondoIndex d-flex align-content-center justify-content-center">
    <div class="align-self-center">
        <div class="card rounded" style="background-color: #f8f9fa ;">
            <div class="card-body">
                <form action="inicio.php" method="GET">
                    <div class="text-center display-4">
                        <p>Ingresa los datos para continuar</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">País</span>
                                    </div>
                                    <input type="text" name="pais" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                    </div>
                                    <input type="text" class="form-control" name="estado" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Ciudad</span>
                                    </div>
                                    <input type="text" name="ciudad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-secondary" type="submit" value="Buscar">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<div class="container-fluid my-3">
    <div class="card text-center rounded" style="background-color: #f8f9fa;">
        <div class="card-body">
            <h5 class="card-title display-3">¿Buscas un servicio o quieres ofrecerlo?</h5>
            <hr>
            <a class="card-text text-dark display-4" href="registroOpcion.php" style="text-decoration: none;">¡Regístrate!</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-4 my-3  d-flex justify-content-center text-center">
            <div class="card border-0 rounded" style="width: 18rem;">
                <img src="img/mision.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Misión</h5>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#mision">Ver</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 my-3  d-flex justify-content-center text-center">
            <div class="card border-0 rounded" style="width: 18rem;">
                <img src="img/quienes-somos.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">¿Quienes somos?</h5>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#quienesSomos">Ver</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 my-3  d-flex justify-content-center text-center">
            <div class="card border-0 rounded" style="width: 18rem;">
                <img src="img/oficio3.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Revisa nuestros oficios</h5>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#oficios">Ver</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
</div>


<!--MODALES-->
<!-- Modal-1-->
<div class="modal fade" id="mision" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Misión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Fomentar el empleo en Mexico y aumentar los ingresos de las familias mexicanas en todos los niveles.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-2-->
<div class="modal fade" id="quienesSomos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">¿Quienes somos?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Somos un grupo de alumnos con iniciativa que quieren buscan brindar una oportunidad de promocion gratuita para el publico en general que cuenta con un oficio.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-3-->
<div class="modal fade" id="oficios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Oficios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <?php foreach ($oficios as $oficio) : ?>
                        <li><?php echo $oficio[1]; ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div class="modal-footer">
                <a href="mailto:chava678ics@gmail.com?subject=SOLICITUD DE OFICIO" class="btn btn-secondary">¿No encuentras el tuyo? Solicitalo</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>