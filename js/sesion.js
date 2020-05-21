function crearSesion() {
    var email = document.getElementById('InputEmail1').value;
    var passw = document.getElementById('InputPassword1').value;    
    
    var xhr = new XMLHttpRequest();
    var parametros = 'email=' + email + '&pass=' + passw;
    xhr.open("POST", ruta+"config/sesion.php", true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = JSON.parse(xhr.responseText); 
            console.log(respuesta);
            if (respuesta.tipo == 'empleado') {
                console.log('empleado');
                
                localStorage.setItem('user', respuesta.nombre);
                window.location = ruta+"inicio.php";
            }else if(respuesta.tipo == 'empleador'){
                console.log("empleador");
                localStorage.setItem('user', respuesta.nombre);
                window.location = ruta + "inicio.php";
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
    xhr.open("POST", ruta + "config/sesion.php", true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var respuesta = xhr.responseText; 
            if (respuesta) {
                localStorage.clear();
                console.log('Si borro la sesion');
                window.location = ruta + "index.php";
            }else{    
                console.log("error");
            }
        }
    }
    xhr.send(parametro);
    
}