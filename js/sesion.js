function crearSesion() {
    var email = document.getElementById('InputEmail1').value;
    var passw = document.getElementById('InputPassword1').value;

    var xhr = new XMLHttpRequest();
    var parametros = 'email=' + email + '&pass=' + passw;
    xhr.open("POST", ruta + "config/sesion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = JSON.parse(xhr.responseText);
            var pais = obtenerValorParametro('pais');
            var estado = obtenerValorParametro('estado');
            var ciudad = obtenerValorParametro('ciudad');
            if (respuesta.tipo == 'empleado') {
                console.log('empleado');

                localStorage.setItem('user', respuesta.nombre);
                localStorage.setItem('tipo', 'empleado');
                window.location = ruta + "inicio.php?pais=" + pais + "&estado=" + estado + "&ciudad=" + ciudad;;
            } else if (respuesta.tipo == 'empleador') {
                console.log("empleador");
                localStorage.setItem('user', respuesta.nombre);
                localStorage.setItem('tipo', 'empleador');
                
                window.location = ruta + "inicio.php?pais=" + pais + "&estado=" + estado + "&ciudad=" + ciudad;
            } else {
                console.log('no entra');
                document.getElementById('alerta').classList.remove('d-none');
            }
        }
    }
    xhr.send(parametros);
}


function cerrarSesion() {
    var xhr = new XMLHttpRequest();
    var parametro = 'cerrar=true';
    xhr.open("POST", ruta + "config/sesion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = xhr.responseText;
            if (respuesta) {
                localStorage.clear();
                console.log('Si borro la sesion');

                window.location = ruta + "index.php";
            } else {
                console.log("error");
            }
        }
    }
    xhr.send(parametro);

}

function obtenerValorParametro(sParametroNombre) {
    var sPaginaURL = window.location.search.substring(1);
    var sURLVariables = sPaginaURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParametro = sURLVariables[i].split('=');
        if (sParametro[0] == sParametroNombre) {
            return sParametro[1];
        }
    }
    return null;
}