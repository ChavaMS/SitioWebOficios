function empleado(){
    window.location="http://localhost/SitioWebOficios/registroEmpleado.php";
}

function empleador(){
    window.location="http://localhost/SitioWebOficios/registroEmpleador.php";
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

