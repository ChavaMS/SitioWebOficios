function empleado() {
    window.location = ruta + "registroEmpleado.php";
}

function empleador() {
    window.location = ruta + "registroEmpleador.php";
}

function cambiar(id) {
    var pestana = new Array();
    pestana[0] = document.getElementById('1e');
    pestana[1] = document.getElementById('2e');
    pestana[2] = document.getElementById('3e');
    pestana[3] = document.getElementById('4e');
    if (id == '1e') {
        pestana[0].classList.remove('d-none');
        pestana[1].classList.add('d-none');
        pestana[2].classList.add('d-none');
        pestana[3].classList.add('d-none');

    } else if (id == '2e') {
        pestana[0].classList.add('d-none');
        pestana[1].classList.remove('d-none');
        pestana[2].classList.add('d-none');
        pestana[3].classList.add('d-none');
    } else if (id == '3e') {
        pestana[0].classList.add('d-none');
        pestana[1].classList.add('d-none');
        pestana[2].classList.remove('d-none');
        pestana[3].classList.add('d-none');
    } else if (id == '4e') {
        pestana[0].classList.add('d-none');
        pestana[1].classList.add('d-none');
        pestana[2].classList.add('d-none');
        pestana[3].classList.remove('d-none');
    }
}

if (window.location.href.includes('inicio.php')) {
    var numUsusarios = document.getElementById('numUsuarios').value;

    for (let i = 0; i < numUsusarios; i++) {
        let usuario = document.getElementById('_' + i);
        let id = document.getElementById("." + i);
        usuario.addEventListener("click", function () {
            verPerfil(id.firstElementChild.value);
        });
    }


    function verPerfil(id) {
        localStorage.setItem("idUsu", id);
        window.location = ruta + 'perfil.php?id=' + id;
    }
}

if (window.location.href.includes('perfil.php')) {
    var desc = new Array();
    var numOficios = document.getElementById('numOficios').value;

    for (let i = 0; i < numOficios; i++) {
        desc[i] = document.getElementById('#' + (i + 1));
        document.getElementById(i + 1).addEventListener('click', function () {
            cargarDescripcion(i + 1);
        });
    }

    function cargarDescripcion(id) {
        if (desc[id - 1].className.includes('d-none')) {
            for (let i = 0; i < numOficios; i++) {
                desc[i].classList.add('d-none');
            }
            desc[id - 1].classList.remove('d-none');
        }

    }

    var coments = new Array();
    var boton = new Array();
    var idTrabajos = new Array();
    var trabajoSeleccionado;
    for (let i = 0; i < numOficios; i++) {
        coments[i] = document.getElementById('###' + (i + 1));
        boton[i] = document.getElementById('##' + (i + 1));
        idTrabajos[i] = document.getElementById('####' + (i + 1)).value;
        document.getElementById('##' + (i + 1)).addEventListener('click', function () {
            comentarios(i);
        });
    }
    trabajoSeleccionado = idTrabajos[0];

    function comentarios(id) {
        console.log("click");
        trabajoSeleccionado = idTrabajos[id];
        console.log(trabajoSeleccionado);

        if (coments[id].className.includes('d-none')) {
            for (let i = 0; i < numOficios; i++) {
                coments[i].classList.add('d-none');
            }
            coments[id].classList.remove('d-none');
        }

    }

    function agregarComentarios() {
        console.log(localStorage.getItem('tipo'));

        if (localStorage.getItem('tipo') == 'empleador') {
            var usuaID = document.getElementById('usuaID').value;
            var mensaje = document.getElementById('mensaje').value;

            var xhr = new XMLHttpRequest();
            var parametro = 'idTrabajo=' + trabajoSeleccionado + "&usuaID=" + usuaID + "&mensaje=" + mensaje;
            xhr.open("POST", ruta + "config/comentarios.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location = window.location.href;
                }
            }
            xhr.send(parametro);
        } else if (localStorage.getItem('tipo') == 'empleado') {
            document.getElementById('error2').classList.remove('d-none');
        } else {
            document.getElementById('error1').classList.remove('d-none');

        }

    }

}

if (!(window.location.href.includes('registroOpcion.php') || window.location.href.includes('registroEmpleado.php') || window.location.href.includes('registroEmpleador.php'))) {
    var cerrSesion = document.getElementById('cerrarSesion');

    if (window.location.href.includes('perfil.php') && localStorage.getItem('user') != null) {
        cerrSesion.classList.remove("d-none");
        document.getElementById('initSesion').classList.add('d-none');
    } else {
        if (!cerrSesion.className.includes('d-none')) {
            cerrSesion.classList.add('d-none');
        }
    }
}


if (window.location.href.includes('registroOpcion.php') || window.location.href.includes('registroEmpleado.php') || window.location.href.includes('registroEmpleador.php') || window.location.href.includes('iniciarSesion.php')) {
    document.getElementById('initSesion').classList.add('d-none');
}


if (window.location.href.includes('inicio.php')) {

    if (localStorage.getItem('user') != null) {
        var usuario = document.getElementById('nombreUsuario');
        var cerrSesion = document.getElementById('cerrarSesion');
        var usuarioDrop = document.getElementById('usuario');

        usuario.innerHTML = localStorage.getItem('user');
        usuario.classList.remove("d-none");

        usuarioDrop.classList.remove('d-none');

        document.getElementById('initSesion').classList.add("d-none");
        cerrSesion.classList.remove("d-none");
    }
    document.getElementById('home').classList.remove('d-none');
}

//Quitamos HOME en index
if (window.location.href.includes('index.php')) {
    document.getElementById('home').classList.add('d-none');
}

if (window.location.href.includes('registroEmpleado.php')) {
    function validacion(e) {
        e.preventDefault();
        var formRegistro = document.getElementById('regiration_form');
        var matutino = document.getElementById('matutino');
        var vespertino = document.getElementById('vespertino');
        var nocturno = document.getElementById('nocturno');
        var correo = document.getElementById('correo').value;
        var oficio = document.getElementById('oficio0');

        if (oficio != null) {
            var xhr = new XMLHttpRequest();
            var parametros = "correo=" + correo;
            xhr.open("POST", ruta + "config/validaciones.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    respuesta = xhr.responseText;
                    if (respuesta == 'existe') {
                        alert('Correo ya registrado');
                    } else if (respuesta == 'no existe') {
                        if (matutino.checked) {
                            formRegistro.submit();
                        } else if (vespertino.checked) {
                            formRegistro.submit();
                        } else if (nocturno.checked) {
                            formRegistro.submit();
                        } else {
                            alert("Seleccione al menos 1 turno");
                        }
                    }
                }
            }
            xhr.send(parametros);

        }else{
            alert('Ingrese por lo menos 1 oficio');
        }

    }
}