function empleado() {
    window.location = ruta + "registroEmpleado.php";
}

function empleador() {
    window.location = ruta + "registroEmpleador.php";
}

if (window.location.href.includes('index.php')) {
    var numUsusarios = document.getElementById('numUsuarios');
    for (let i = 0; i < numUsusarios; i++) {
        let usuario = document.getElementById('_' + i);
        usuario.addEventListener("click", function () {
            verPerfil(usuario.firstElementChild.value);
        });
    }


    function verPerfil(id) {
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
    for (let i = 0; i < numOficios; i++) {
        coments[i] = document.getElementById('###' + (i + 1));
        boton[i] = document.getElementById('##' + (i + 1));
        document.getElementById('##' + (i + 1)).addEventListener('click', function () {
            comentarios(i);
        });
    }



    function comentarios(id) {
        console.log("click");

        if (coments[id].className.includes('d-none')) {
            for (let i = 0; i < numOficios; i++) {
                coments[i].classList.add('d-none');
            }
            coments[id].classList.remove('d-none');
        }

    }

}

if (!(window.location.href.includes('registroOpcion.php') || window.location.href.includes('registroEmpleado.php') || window.location.href.includes('registroEmpleador.php'))) {
    var cerrSesion = document.getElementById('cerrarSesion');

    if (window.location.href.includes('perfil.php')) {
        cerrSesion.classList.remove("d-none");
        document.getElementById('initSesion').classList.add('d-none');
    } else {
        if (!cerrSesion.className.includes('d-none')) {
            cerrSesion.classList.add('d-none');
        }
    }
}

if (window.location.href.includes('index.php')) {

    if (localStorage.getItem('user') != null) {
        var usuario = document.getElementById('usuario');
        //var cerrSesion = document.getElementById('cerrarSesion');

        usuario.innerHTML = localStorage.getItem('user');
        usuario.classList.remove("d-none");

        document.getElementById('initSesion').classList.add("d-none");
        //cerrSesion.classList.remove("d-none");
    }
}

