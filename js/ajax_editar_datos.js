window.addEventListener("click", function(event){
    if(event.target.id == 'editar_datos') editar_datos(event)
})

function editar_datos(event){
    let inputs = document.getElementsByTagName('input'),
    textareas = document.getElementsByTagName('textarea'),
    alumno = {},familiares = [], familiar = {}

    for (let i = 0; i < document.querySelectorAll('#nom_ape').length; i++) {
        familiar = {}

        familiar = {'id_familiar': document.querySelectorAll('#id_familiar')[i].value,
        'nom_ape': document.querySelectorAll('#nom_ape')[i].value,
        'vinculo': document.querySelectorAll('#vinculo')[i].value,
        'tel_familiar': document.querySelectorAll('#tel_familiar')[i].value,
        'observacion_familiar': document.querySelectorAll('#observacion_familiar')[i].value}

        familiares.push(familiar)
    }

    alumno = {'id_alumno': document.querySelector('#id_alumno').value,
    'apellido': document.querySelector('#apellido').value,
    'nombre': document.querySelector('#nombre').value,
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
    'actividad': document.querySelector('#actividad').value,
    'observacion_alumno': document.querySelector('#observacion_alumno').value}

    if(event.target.textContent == 'Guardar datos'){
        /************** CARGA LOS DATOS ****************/
        fetch('ajax/ajax_editar_datos.php', {
            method: "POST",
            // Set the post data
            body: JSON.stringify({'alumno':alumno,'familiares':familiares})
        })
        .then(response => response.json())
        .then(function (json) {
            console.log(json)
            if(json.respAlumno && json.respFamiliar) alertify.alert('Datos personales','Guardado correctamente.')
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Datos personales','Ocurrio un error al guardar los datos.')
        })
    }
    /************* LE SACO LOS READONLY ******************/
    for (let i = 0; i < inputs.length; i++) {
        if(inputs[i].readOnly == true){
            inputs[i].readOnly = false
            inputs[i].setAttribute('style','background: rgba(102, 88, 106, 0.9) !important;')
        }else{
            inputs[i].readOnly = true
            inputs[i].setAttribute('style','background: rgba(31, 4, 24, 0.9) !important;')
        }
    }
    for (let t = 0; t < textareas.length; t++) {
        if(textareas[t].readOnly == true){
            textareas[t].readOnly = false
            textareas[t].setAttribute('style','background: rgba(102, 88, 106, 0.9) !important;')
        }else{
            textareas[t].readOnly = true
            textareas[t].setAttribute('style','background: rgba(31, 4, 24, 0.9) !important;')
        }
    }
    /*********** LE CAMBIO EL NOMBRE AL BOTON ********************/
    if(event.target.textContent == 'Editar datos') event.target.textContent = 'Guardar datos'
    else event.target.textContent = 'Editar datos'
}