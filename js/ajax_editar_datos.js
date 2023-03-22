window.addEventListener("click", function(event){
    if(event.target.id == 'editar_datos') editar_datos(event)
    if(event.target.id == 'eliminar_actividad') eliminar_actividad(event)
    if(event.target.id == 'agregar_actividad') agregar_actividad(event)
    if(event.target.id == 'eliminar_alumno') eliminar_alumno(event)
    if(event.target.id == 'eliminar_familiar') eliminar_familiar(event)
})

/************** EDITAR ALUMNO ****************/
function editar_datos(event){
    let inputs = document.getElementsByTagName('input'),
    textareas = document.getElementsByTagName('textarea'),
    actividad = '',alumno = {},familiares = [], familiar = {}

    for (let i = 0; i < document.querySelectorAll('#nom_ape').length; i++) {
        familiar = {}
        familiar = {'id_familiar': document.querySelectorAll('#id_familiar')[i].value,
        'nom_ape': document.querySelectorAll('#nom_ape')[i].value,
        'vinculo': document.querySelectorAll('#vinculo')[i].value,
        'tel_familiar': document.querySelectorAll('#tel_familiar')[i].value,
        'observacion_familiar': document.querySelectorAll('#observacion_familiar')[i].value}

        familiares.push(familiar)
    }

    for (let i = 0; i < document.querySelectorAll('#actividad').length; i++) {
        if(document.querySelectorAll('#actividad')[i].value == '') continue
        actividad += document.querySelectorAll('#actividad')[i].value+'|'
    }
    // console.log(familiar)
    // return
    alumno = {'id_alumno': document.querySelector('#id_alumno').value,
    'apellido': document.querySelector('#apellido').value,
    'nombre': document.querySelector('#nombre').value,
    'foto_perfil': document.querySelector('#foto_base64').value,
    'edad': document.querySelector('#edad').value,
    'fecha_nac': document.querySelector('#fecha_nac').value,
    'documento': document.querySelector('#documento').value,
    'correo': document.querySelector('#correo').value,
    'tel_alumno': document.querySelector('#tel_alumno').value,
    'tel_fijo': document.querySelector('#tel_fijo').value,
    'nacionalidad': document.querySelector('#nacionalidad').value,
    'localidad': document.querySelector('#localidad').value,
    'domicilio': document.querySelector('#domicilio').value,
    'salud': document.querySelector('#salud').value,
    'actividad': actividad,
    'observacion_alumno': document.querySelector('#observacion_alumno').value}

    if(event.target.textContent == 'Guardar datos'){
        alertify.confirm('Datos del alumno/a', 'Seguro que quiere editar los datos de este alumno/a ?', function(){
            /************** CARGA LOS DATOS ****************/
            fetch('ajax/ajax_editar_datos.php', {
                method: "POST",
                // Set the post data
                body: JSON.stringify({'alumno':alumno,'familiares':familiares})
            })
            .then(response => response.json())
            .then(function (json) {
                console.log(json)
                alertify.success('Guardado correctamente.')
            })
            .catch(function (error){
                console.log(error)
                // Catch errors
                alertify.alert('Datos del alumno/a','Ocurrio un error al guardar los datos.')
            })
        }, function(){ alertify.error('Cancelado')});

    }
    /************* LE SACO LOS READONLY ******************/
    for (let i = 0; i < inputs.length; i++) {
        
        if(inputs[i].id == 'valor' || inputs[i].id == 'efectivo') continue

        if(inputs[i].readOnly == true){
            inputs[i].readOnly = false
            // inputs[i].setAttribute('style','background: rgba(102, 88, 106, 0.9) !important;')
        }else{
            inputs[i].readOnly = true
            // inputs[i].setAttribute('style','background: rgba(31, 4, 24, 0.9) !important;')
        }
    }
    for (let t = 0; t < textareas.length; t++) {
        if(textareas[t].readOnly == true){
            textareas[t].readOnly = false
            // textareas[t].setAttribute('style','background: rgba(102, 88, 106, 0.9) !important;')
        }else{
            textareas[t].readOnly = true
            // textareas[t].setAttribute('style','background: rgba(31, 4, 24, 0.9) !important;')
        }
    }
    /*********** LE CAMBIO EL NOMBRE AL BOTON ********************/
    if(event.target.textContent == 'Editar datos') event.target.textContent = 'Guardar datos'
    else event.target.textContent = 'Editar datos'
}




/************** ELMINIAR ALUMNO ****************/
function eliminar_alumno(){
    const datosPost = new FormData()
    datosPost.append('id', document.querySelector('#id_alumno').value)
    alertify.confirm('Datos del alumno/a', 'Seguro que quiere eliminar a este alumno/a ?', function(){
        fetch('ajax/ajax_eliminar_alumno.php', {
            method: "POST",
            // Set the post data
            body: datosPost
        })
        .then(response => response.json())
        .then(function (json) {
            console.log(json)
            alertify.error('Eliminado correctamente')
            setTimeout(function(){window.location.href = 'index.php'}, 2000)
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Datos del alumno/a','Ocurrio un error al eliminar al alumno.')
        })
    }, function(){ alertify.error('Cancelado')});
}

function eliminar_familiar(event){

    const datosPost = new FormData()
    datosPost.append('id', event.target.parentNode.querySelector('#id_familiar').value)
    alertify.confirm('Datos del alumno/a', 'Seguro que quiere eliminar a este familiar/a ?', function(){
        fetch('ajax/ajax_eliminar_familiar.php', {
            method: "POST",
            // Set the post data
            body: datosPost
        })
        .then(response => response.json())
        .then(function (json) {
            console.log(json)
            alertify.error('Eliminado correctamente')
            setTimeout(function(){location.reload()}, 2000)
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Datos del alumno/a','Ocurrio un error al eliminar al alumno.')
        })
    }, function(){ alertify.error('Cancelado')});
}

function agregar_actividad(){
    let readOnly = document.getElementsByTagName('input')[3].readOnly
    readOnly = readOnly == true ? 'readonly' : ''

    document.querySelector('#nueva_actividad').innerHTML += `<div class="form-group col-md-12 float-left">
                <label>Nueva actividad</label>
                <i class="bi bi-dash-circle-dotted eliminar_actividad" title="Eliminar actividad" id="eliminar_actividad"></i>
                <textarea class="form-control" id="actividad"`+readOnly+`></textarea>        
            </div>`
}
function eliminar_actividad(event){

    let element = event.target.parentElement 
    if(element.querySelector('label').textContent == 'Nueva actividad') element.parentNode.removeChild(element)
    else element.parentNode.removeChild(element)
}
