window.addEventListener("click", function(event){
    if(event.target.id == 'guardar_vinculo') guardar_vinculo(event)
    if(event.target.id == 'guardar_actividad') guardar_actividad(event)

})

window.addEventListener("change", function(event){
    if(event.target.id == 'id_actividad') datos_actividad(event)
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

function datos_actividad(event){

    let id_actividad = document.querySelector('#id_actividad').value

    if(id_actividad.trim() == '0'){
        return alertify.alert('Actividades','Seleccione una actividad.')
    }

    fetch('ajax/ajax_guardar_vinculo.php', {
        method: "POST",
        // Set the post data
        body: JSON.stringify({'id_actividad':id_actividad})
    })
    .then(response => response.json())
    .then(function (json) {
        console.log(json.respActividad[0])
        document.querySelector('#cargar_actividad').innerHTML = 
        `<div class="form-group col-md-4 float-left">
            <label for="exampleFormControlInput1">Actividad</label>
            <input type="text" id="id_guardar_actividad" class="form-control" value="`+json.respActividad[0].actividad+`">
        </div>
        <div class="form-group col-md-2 float-left">
            <label for="exampleFormControlInput1">Precio 1</label>
            <input type="number" id="id_guardar_una" class="form-control" value="`+json.respActividad[0].una_vez+`">
        </div>
        <div class="form-group col-md-2 float-left">
            <label for="exampleFormControlInput1">Precio 1 efectivo</label>
            <input type="number" id="id_guardar_una_efectivo" class="form-control" value="`+json.respActividad[0].una_vez_efec+`">
        </div>
        <div class="form-group col-md-2 float-left">
            <label for="exampleFormControlInput1">Precio 2</label>
            <input type="number" id="id_guardar_dos" class="form-control" value="`+json.respActividad[0].dos_veces+`">
        </div>
        <div class="form-group col-md-2 float-left">
            <label for="exampleFormControlInput1">Precio 2 efectivo</label>
            <input type="number" id="id_guardar_dos_efectivo" class="form-control" value="`+json.respActividad[0].dos_veces_efec+`">
        </div>`
    })
    .catch(function (error){
        console.log(error)
        // Catch errors
        alertify.alert('Actividades','Ocurrio un error al cargar los datos.')
    })

}

function guardar_actividad(event){
    let guardar_actividad = {},
    id_actividad = document.querySelector('#id_actividad').value

    
    if(id_actividad == 0){
        return alertify.alert('Guardar actividad','Tiene que seleccionar una actividad.')
    }
    guardar_actividad = {'id_guardar_id': id_actividad,
    'id_guardar_actividad': document.querySelector('#id_guardar_actividad').value,
    'id_guardar_una': parseInt(document.querySelector('#id_guardar_una').value),
    'id_guardar_una_efectivo': parseInt(document.querySelector('#id_guardar_una_efectivo').value),
    'id_guardar_dos': parseInt(document.querySelector('#id_guardar_dos').value),
    'id_guardar_dos_efectivo': parseInt(document.querySelector('#id_guardar_dos_efectivo').value)}

    if(guardar_actividad.id_guardar_actividad.trim() == ''){
        return alertify.alert('Guardar actividad','El campo actividad no puede quedar vacio.')
    }
    if(isNaN(guardar_actividad.id_guardar_una) || isNaN(guardar_actividad.id_guardar_una_efectivo) ||
    isNaN(guardar_actividad.id_guardar_dos) || isNaN(guardar_actividad.id_guardar_dos_efectivo)){
        return alertify.alert('Guardar actividad','Uno de los precios    no es numerico.(Se admite solo numero,sin comas o puntos)')
    }

    alertify.confirm('Guardar actividad', 'Seguro que quiere guardar esta actividad ?', function(){

        fetch('ajax/ajax_guardar_vinculo.php', {
            method: "POST",
            // Set the post data
            body: JSON.stringify({'guardar_actividad':guardar_actividad})
        })
        .then(response => response.json())
        .then(function (json) {
            if(json.respGuardarActividad){
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