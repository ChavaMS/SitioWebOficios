if (window.location.href.includes("inicio.php")) {

    var empleados = new Array();
    var ids = new Array();
    var map;
    var respuesta
    var parametros = "";
    for (let i = 0; i < 5; i++) {
        let empleado = document.getElementById('-' + i);
        let id = document.getElementById('i' + i);
        if (empleado != null)
            empleados[i] = empleado;
        if (id != null)
            ids[i] = id.value;
    }


    for (let i = 0; i < ids.length; i++) {
        if (!(i == (ids.length - 1)))
            parametros += 'id' + i + "=" + ids[i] + "&";
        else
            parametros += 'id' + i + "=" + ids[i] + "&inicio=true";
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", ruta + "config/ubicacion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            respuesta = JSON.parse(xhr.responseText);
            //console.log(respuesta.coordenadas.lat);
            initMap();
        }
    }
    xhr.send(parametros);


    function initMap() {
        for (let i = 0; i < respuesta.coordenadas.length; i++) {
            map = new google.maps.Map(empleados[i], {
                center: { lat: parseFloat(respuesta.coordenadas[i].lat), lng: parseFloat(respuesta.coordenadas[i].lon) },
                zoom: 15
            });
        }

    }

    function revisarOpciones(e) {
        e.preventDefault();
        var lat = document.getElementById('lat');
        var lon = document.getElementById('lon');
        var form = document.getElementById('formBusqueda');
        var calle = document.getElementById('calle').value;
        var colonia = document.getElementById('colonia').value;
        var cp = document.getElementById('cp').value;
        var estado = window.location.href.split('?')[1].split('&')[1].split('=')[1];
        var ciudad = window.location.href.split('?')[1].split('&')[2].split('=')[1];
        var location;
        if (calle != '' || colonia != '' || cp != '') {
            location = cp + ' ' + calle + ' ' + colonia + ',' + ciudad +  ' ' + estado + ' Mexico';
            axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: location,
                    key: 'AIzaSyDgRN1AR5CnGjgdcc3f93CzMho80a2yWog'
                }
            }).then(function (resp) {
                //console.log(resp.data.results[0].geometry.location.lat);
                lat.value = resp.data.results[0].geometry.location.lat;
                lon.value = resp.data.results[0].geometry.location.lng;                
                form.submit();
            }).catch(function (error) {
                console.log(error);

            });
        }else{
            form.submit();
        }
    }


} else if (window.location.href.includes("perfil.php")) {
    var idUsuario = document.getElementById("usuaID").value;
    var xhr = new XMLHttpRequest();
    var parametros = "perfil=true&idUsu=" + idUsuario;
    xhr.open("POST", ruta + "config/ubicacion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            respuesta = JSON.parse(xhr.responseText);
            console.log(respuesta);
            initMap1();
        }
    }
    xhr.send(parametros);


    function initMap1() {
        var coords = { lat: parseFloat(respuesta.coordenadas.lat), lng: parseFloat(respuesta.coordenadas.lon) };
        map = new google.maps.Map(document.getElementById("mapa"), {
            center: coords,
            zoom: 15
        });

        addMarker(coords, map);
    }
}

function addMarker(coords, map) {
    var marker = new google.maps.Marker({
        position: coords,
        map: map,
        icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
    });
}