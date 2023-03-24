window.addEventListener("click", function(event){
    if(event.target.id == 'guardar_familiar') guardar_familiar(event)
})

function guardar_familiar(event){
    let familiar = {}

    familiar = {'id_alumno': document.querySelector('#id_alumno').value,
    'nom_ape': document.querySelector('#nom_ape').value,
    'vinculo': document.querySelector('#vinculo').value,
    'tel_familiar': document.querySelector('#tel_familiar').value,
    'observacion_familiar': document.querySelector('#observacion_familiar').value}

    if(familiar.nom_ape.trim() == '' || familiar.vinculo.trim() == '' || familiar.tel_familiar.trim() == ''){
        return alertify.alert('Carga de familiares','Complete los datos obligatorios (*)')
    }
    alertify.confirm('Carga de familiares', 'Seguro que quiere guardar los datos de este familiar/a ?', function(){

        fetch('ajax/ajax_guardar_familiar.php', {
            method: "POST",
            // Set the post data
            body: JSON.stringify({'familiar':familiar})
        })
        .then(response => response.json())
        .then(function (json) {
            // console.log(json)
            if(json.respFamiliar){
                alertify.success('Guardado correctamente')
                setTimeout(function(){location.reload()}, 2000)
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de familiares','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}