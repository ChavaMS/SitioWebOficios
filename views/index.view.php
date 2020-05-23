<div class="fondoIndex d-flex align-content-center justify-content-center">
    <div class="align-self-center">
        <div class="card rounded" style="background-color: #f8f9fa ;">
            <div class="card-body">
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
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Ciudad</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="inicio.php" class="btn btn-secondary">Buscar</a>
                </div>
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
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium, dolores? Dolorem vitae facilis molestiae! Aspernatur voluptatem numquam animi amet reiciendis.</p>
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eius dicta! Repudiandae ut quo, praesentium quisquam ex corporis doloremque. Autem!</p>
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, adipisci eaque in aut quos corrupti voluptates! Necessitatibus exercitationem officia illum.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">¿No encuentras el tuyo? Solicitalo</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>