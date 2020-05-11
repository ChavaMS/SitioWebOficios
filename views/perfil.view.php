<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8 border fondo">
            <div class="row">
                <div class="col-4">

                    <div class="card my-3" style="width: 18rem;">
                        <img src="img/El ojo de Dios.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title">Edad</p>
                            <p class="card-text">Dirección</p>
                            <div class="text-center">
                                <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Contactar</button>
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
                                    <span>1</span>
                                    <i class="far fa-thumbs-up"></i>
                                    <span>1</span>
                                    <i class="far fa-thumbs-down"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <p class="border p-3" style="height: 100%;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                            <p>Nombre empleador</p>
                            <p>Correo: Correo@gmail.com</p>
                            <p>Teléfono: 982242424</p>
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#oficio1" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 1
                            </button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#oficio2" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 2
                            </button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#oficio3" aria-expanded="false" aria-controls="collapseExample">
                                Oficio 3
                            </button>
                        </p>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
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
                            <button class="btn btn-primary mt-2" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
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