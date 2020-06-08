<div class="container-fluid pt-5 img-fluid" style="background-image: url('img/oficio5.jpg');">
    <div class="row ">
        <div class="col-8">

        </div>
        <div class="col-4 d-flex justify-content-md-center align-items-center min-vh-100">
            <div class="card rounded w-100">
                <div class="card-body">
                <div id="alerta" class="text-center bg-danger d-none"><p style="font-size: 1rem;">Correo o contraseña incorrectos</p></div>
                    <h5 class="card-title text-center">Iniciar sesión</h5>
                    <div class="form-group">
                        <label for="InputEmail1">Email address</label>
                        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Password</label>
                        <input type="password" class="form-control" id="InputPassword1">
                    </div>
                    <div class="text-center">
                        <button onclick="crearSesion()" class="btn btn-secondary">Iniciar sesión</button>
                        <a class="text-dark d-block" href="#">¿Olvidaste tu contraseña?</a>
                        <a class="text-dark d-block" href="registroOpcion.php">¿No tienes una cuenta? Registrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>