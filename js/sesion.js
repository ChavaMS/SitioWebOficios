function crearSesion() {
    var email = document.getElementById('InputEmail1').value;
    var passw = document.getElementById('InputPassword1').value;    
    
    var xhr = new XMLHttpRequest();
    var parametros = 'email=' + email + '&pass=' + passw;
    xhr.open("POST", "http://localhost/SitioWebOficios/config/sesion.php", true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = JSON.parse(xhr.responseText); 
            if (respuesta.tipo == 'empleado') {
                //console.log(respuesta);
                console.log('empleado');
                
                localStorage.setItem('user', respuesta.nombre);
                window.location="http://localhost/SitioWebOficios/index.php";
            }else if(respuesta.tipo == 'empleador'){
                console.log("empleador");
            }else{
                console.log('no entra');
                
            }
        }
    }
    xhr.send(parametros);
}


function cerrarSesion(){
    var xhr = new XMLHttpRequest();
    var parametro = 'cerrar=true';
    xhr.open("POST", "http://localhost/SitioWebOficios/config/sesion.php", true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = xhr.responseText; 
            if (respuesta) {
                localStorage.clear();
                console.log('Si borro la sesion');
                window.location="http://localhost/SitioWebOficios/index.php";
            }else{    
                console.log("error");
            }
        }
    }
    xhr.send(parametro);
    
}