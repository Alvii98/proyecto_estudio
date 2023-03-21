window.addEventListener("click", function(event){
    if(event.target.id == 'guardar_vinculo') guardar_vinculo(event)
})

function guardar_vinculo(event){
    let alumnos = {}

    alumnos = {'id_alumno_1': document.querySelector('#id_alumno_1').value,
    'id_alumno_2': document.querySelector('#id_alumno_2').value,
    'vinculo': document.querySelector('#vinculo').value}

    if(alumnos.id_alumno_1.trim() == '0' || alumnos.id_alumno_2.trim() == '0' || alumnos.vinculo.trim() == '0'){
        return alertify.alert('Carga de vinculos','Complete los datos obligatorios (*)')
    }

    alertify.confirm('Carga de vinculos', 'Seguro que quiere guardar este vinculo ?', function(){

        fetch('ajax/ajax_guardar_vinculo.php', {
            method: "POST",
            // Set the post data
            body: JSON.stringify({'alumnos':alumnos})
        })
        .then(response => response.json())
        .then(function (json) {
            // console.log(json)
            if(json.respVinculo){
                alertify.success('Guardado correctamente')
                setTimeout(function(){location.reload()}, 2000)
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de vinculos','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}