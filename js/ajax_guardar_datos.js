window.addEventListener("click", function(event){
    if(event.target.id == 'guardar_datos') guardar_datos(event)
})

function guardar_datos(event){
    let alumno = {}

    alumno = {'apellido': document.querySelector('#apellido').value,
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

    fetch('ajax/ajax_guardar_datos.php', {
        method: "POST",
        // Set the post data
        body: JSON.stringify({'alumno':alumno})
    })
    .then(response => response.json())
    .then(function (json) {
        console.log(json)
        if(json.respAlumno) alertify.alert('Carga de datos','Datos guardados correctamente.')
    })
    .catch(function (error){
        console.log(error)
        // Catch errors
        alertify.alert('Carga de datos','Ocurrio un error al guardar los datos.')
    })
}