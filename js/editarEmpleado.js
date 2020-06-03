if (window.location.href.includes("datosPerfilEmpleado.php")) {

    var padre = document.getElementById("padre");
    var combo = document.getElementById("nombreOficios");
    var xhr = new XMLHttpRequest();
    var oficios = new Array();
    var idOficios = new Array();
    var parametro = 'cargarOficios=true';
    xhr.open("POST", ruta + "config/editarPerfil.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = JSON.parse(xhr.responseText);
            respuesta.forEach(element => {
                oficios.push(element.nombre);
                var elemento = `<option value="${element.id}">${element.nombre}</option>`;
                combo.innerHTML += elemento;
            });
        }
    }
    xhr.send(parametro);
 

    function eliminar(idTrabajo) {
        var xhr = new XMLHttpRequest();

        var parametro = 'idTrabajo=' + idTrabajo + "&eliminar=true";
        xhr.open("POST", ruta + "config/editarPerfil.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {

                //window.location = window.location.href;
            }
        }
        xhr.send(parametro);
    }

}