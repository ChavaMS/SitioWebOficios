//GLOBAL
var ruta = "http://localhost/SitioWebOficios/";

if (window.location.href.includes('perfil.php')) {
    var estrellas = new Array();

    for (let i = 0; i < 5; i++) {
        estrellas[i] = document.getElementById('r' + i);
    }

    if (localStorage.getItem('tipo') != 'empleador' || localStorage.getItem('tipo') == null) {
        for (let i = 0; i < 5; i++) {
            estrellas[i].classList.remove('fa-mod');
        }
    }


    function efecto(indice) {
        if (localStorage.getItem('tipo') == 'empleador') {
            for (i = 0; i < 5; i++) {
                estrellas[i].classList.remove('fas');
                estrellas[i].classList.add('far');
            }
            for (i = 0; i <= indice; i++) {
                estrellas[i].classList.remove('far');
                estrellas[i].classList.add('fas');
            }
        }
    }

    function reset(rating) {
        if (localStorage.getItem('tipo') == 'empleador') {
            for (i = 0; i < 5; i++) {
                if (i < rating) {
                    estrellas[i].classList.remove('far');
                    estrellas[i].classList.add('fas');
                } else {
                    estrellas[i].classList.remove('fas');
                    estrellas[i].classList.add('far');
                }
            }
        }
    }

    function valorar(calif) {
        if (localStorage.getItem('tipo') == 'empleador') {
            var idEmpleado = document.getElementById('usuaID').value;
            var xhr = new XMLHttpRequest();
            var parametro = 'rating=' + calif + "&idEmpleado=" + idEmpleado;
            xhr.open("POST", ruta + "config/rating.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {

                }
            }
            xhr.send(parametro);
        }

    }
}



