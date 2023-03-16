document.addEventListener('keyup', function (event) {
    if(event.target.id == 'edad'){
        document.querySelector('#apellido').value = ''
        document.querySelector('#nombre').value = ''
        document.querySelector('#actividad').value = ''
    }else{
        document.querySelector('#edad').value = ''
    }
    if(event.keyCode == 13) buscar()
})

document.addEventListener('click', function (event) {
    if(event.target.id == 'buscar') buscar()
})
document.addEventListener('DOMContentLoaded', function (event) {
    buscar()
})

function buscar(){
    const datosPost = new FormData()
    datosPost.append('apellido', document.querySelector('#apellido').value)
    datosPost.append('nombre', document.querySelector('#nombre').value)
    datosPost.append('edad', document.querySelector('#edad').value)
    datosPost.append('actividad', document.querySelector('#actividad').value)
    
    fetch('ajax/ajax_busqueda.php', {
        method: "POST",
        // Set the post data
        body: datosPost
    })
    .then(response => response.json())
    .then(function (json) {
        let tbody = ''
        console.log(json.datos)
        if(json.datos.length > 0){
            json.datos.forEach(element => {
                document.querySelector('#cant_res').textContent = json.datos.length+' resultados.'
                tbody += `<tr onclick="alumno_id(`+element.id+`)"><td>`+element.apellido+`</td>
                <td>`+element.nombre+`</td>
                <td>`+element.edad+`</td>
                <td>`+element.actividad+`</td></tr>`
            });
        }else{
            document.querySelector('#cant_res').textContent = json.datos.length+' resultados.'
            tbody = '<th colspan="6" class="text-center">No se encontraron resultados</th>'
        }

        document.querySelector('tbody').innerHTML = tbody
    })
    .catch(function (error){
        console.log(error)
        // Catch errors
        alertify.alert('Datos alumnos','Ocurrio un error en la busqueda.')
    })

}

function alumno_id(id){
    // document.querySelector('form[name="alumno_'+id+'"]').submit()
    window.location.href = 'datos.php?id='+id
}