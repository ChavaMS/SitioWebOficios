if (window.location.href.includes('datosPerfilEmpleado.php')) {
    var id = 0;
    var padre = document.getElementById("padre");
    var oficios = new Array();
    var existe = false;

    //Cargamos los oficios que ya existen



    function agregar() {
        var seleccion = document.getElementById("nombreOficios").value;
        var combo = document.getElementById("nombreOficios");
        var selected = combo.options[combo.selectedIndex].text;
        oficios.forEach(element => {
            if (element.indexOf(seleccion) == 0) {
                existe = true;
            }
        });

        if (!existe) {
            oficios.push(seleccion);
            var elemento = `<div class="row my-4" id="${id}">
                      <div class="col-md-6" id="izquierda">
                        <input type="text" name="${id}" class="d-none" value="${seleccion}" >
                        <label for="oficio${id}" class="col-form-label">${selected}:</label>
                      </div>
                      <div class="col-md-6" id="derecha">
                        <textarea name="oficio${id}" id="oficio${id++}" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                  </div>`;
            padre.innerHTML += elemento;
        }
        existe = false;

    }

    function borrar() {
        if (id > 0) {
            var child = document.getElementById(id - 1);
            var parent = child.parentNode;
            parent.removeChild(child);
            id--;
            oficios.pop();

        }

    }

    document.getElementById("file").onchange = function(e) {
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function() {
            let preview = document.getElementById('preview'),
                image = document.createElement('img');

            image.src = reader.result;
            image.className = 'img-fluid rounded';

            preview.innerHTML = '';
            preview.append(image);

        };
    }
}

if (window.location.href.includes('registroEmpleado.php')) {
    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).parent().parent();
            next_step = $(this).parent().parent().next();
            next_step.show();
            current_step.hide();
        });
        $(".previous").click(function() {
            current_step = $(this).parent().parent();
            next_step = $(this).parent().parent().prev();
            next_step.show();
            current_step.hide();
        });
    });


    var id = 0;
    var padre = document.getElementById("padre");
    var oficios = new Array();
    var existe = false;

    function agregar() {
        var seleccion = document.getElementById("nombreOficios").value;
        var combo = document.getElementById("nombreOficios");
        var selected = combo.options[combo.selectedIndex].text;
        oficios.forEach(element => {
            if (element.indexOf(seleccion) == 0) {
                existe = true;
            }
        });

        if (!existe) {
            oficios.push(seleccion);
            var elemento = `<div class="row my-4" id="${id}">
                      <div class="col-md-6" id="izquierda">
                        <input type="text" name="${id}" class="d-none" value="${seleccion}" >
                        <label for="oficio${id}" class="col-form-label">${selected}:</label>
                      </div>
                      <div class="col-md-6" id="derecha">
                        <textarea name="oficio${id}" id="oficio${id++}" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                  </div>`;
            padre.innerHTML += elemento;
        }
        existe = false;

    }

    function borrar() {
        if (id > 0) {
            var child = document.getElementById(id - 1);
            var parent = child.parentNode;
            parent.removeChild(child);
            id--;
            oficios.pop();

        }

    }

    document.getElementById("file").onchange = function(e) {
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function() {
            let preview = document.getElementById('preview'),
                image = document.createElement('img');

            image.src = reader.result;
            image.className = 'img-fluid rounded';

            preview.innerHTML = '';
            preview.append(image);

        };
    }
}