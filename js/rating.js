window.onload = function () {

    if(window.location.href.includes('index.php')){
        rating();
    }
}

function rating() {
    var divs = new Array();
    for (let i = 0; i < 5; i++) {
        divs[i] = document.getElementById('rate' + i);
    }

    var inicio = (getQueryVariable('p') > 1) ? getQueryVariable('p') * 5 - 5 : 0;
    var respuesta;
    var options = new Array();
    var xhr = new XMLHttpRequest();
    var parametros = 'inicio=' + inicio;


    xhr.open("POST", "http://localhost/SitioWebOficios/config/rating.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            respuesta = JSON.parse(xhr.responseText);
            var rating = new Array();
            respuesta.valor0 != null ? rating[0] = respuesta.valor0 : '';
            respuesta.valor1 != null ? rating[1] = respuesta.valor1 : '';
            respuesta.valor2 != null ? rating[2] = respuesta.valor2 : '';
            respuesta.valor3 != null ? rating[3] = respuesta.valor3 : '';
            respuesta.valor4 != null ? rating[4] = respuesta.valor4 : '';

            for (let i = 0; i < rating.length; i++) {
                options[i] = {
                    max_value: 5,
                    step_size: 1,
                    initial_value: rating[i],
                    selected_symbol_type: 'fontawesome_star', // Must be a key from symbols
                    cursor: 'default',
                    readonly: true,
                    change_once: false, // Determines if the rating can only be set once
                }

                var element = '<span class="mt-3 mx-2">Calificación:</span><div class="rate' + i + ' mt-3"></div>';
                divs[i].innerHTML = element;
            }

            $(".rate0").rate(options[0]);
            $(".rate1").rate(options[1]);
            $(".rate2").rate(options[2]);
            $(".rate3").rate(options[3]);
            $(".rate4").rate(options[4]);

        }
    }
    xhr.send(parametros);


    function getQueryVariable(variable) {
        // Estoy asumiendo que query es window.location.search.substring(1);
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
    }
}
