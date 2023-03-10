document.addEventListener('keyup', function (event) {
    if(event.target.id == 'apellido'){
        document.querySelector('#nombre').value = ''
        document.querySelector('#edad').value = ''
        document.querySelector('#actividad').value = ''
    }
    if(event.target.id == 'nombre'){
        document.querySelector('#apellido').value = ''
        document.querySelector('#edad').value = ''
        document.querySelector('#actividad').value = ''
    }
    if(event.target.id == 'edad'){
        document.querySelector('#apellido').value = ''
        document.querySelector('#nombre').value = ''
        document.querySelector('#actividad').value = ''
    }
    if(event.target.id == 'actividad'){
        document.querySelector('#apellido').value = ''
        document.querySelector('#nombre').value = ''
        document.querySelector('#edad').value = ''
    }
    if(event.keyCode == 13) buscar()

})
document.addEventListener('click', function (event) {
    if(event.target.id != 'buscar') return
    buscar()
})
function buscar(){

    var apellido, nombre, actividad, edad, table, tr, td, td1, td2, td3, td_cont

    apellido = document.querySelector('#apellido').value.toUpperCase() //Parametro pasado a mayuscula
    nombre = document.querySelector('#nombre').value.toUpperCase() //Parametro pasado a mayuscula
    actividad = document.querySelector('#actividad').value.toUpperCase() //Parametro pasado a mayuscula
    edad = document.querySelector('#edad').value.toUpperCase() //Parametro pasado a mayuscula
    table = document.querySelector('table')
    tr = table.getElementsByTagName("tr") 
    td_cont = 0
    // recorre todos los tr
    for (let i = 0; i < tr.length; i++) {
        // Elemento td de la columna seleccionada
        td = tr[i].getElementsByTagName("td")[0]
        td1 = tr[i].getElementsByTagName("td")[1]
        td2 = tr[i].getElementsByTagName("td")[2]
        td3 = tr[i].getElementsByTagName("td")[3]

            
        if (td || td1 || td2 || td3) {
            td_cont++
            td = td.innerHTML.toUpperCase().indexOf(apellido)
            td1 = td1.innerHTML.toUpperCase().indexOf(nombre)
            td2 = td2.innerHTML.toUpperCase().indexOf(edad)
            td3 = td3.innerHTML.toUpperCase().indexOf(actividad)
            //indexOf() retorna el indice donde se encuentra la palaba(filter) o -1 si no esta
            if(td > -1 && apellido != '' || td1 > -1 && nombre != '' || td2 > -1 && edad != '' || td3 > -1 && actividad != ''){
                tr[i].style.display = ""
                document.querySelector('#no_result').style.display = "none"
            }else{
                td_cont--
                tr[i].style.display = "none"
            }
        }
    }

    if(td_cont == 0){
        document.querySelector('#no_result').style.display = ""
    }
}

function alumno_id(id){
    // alert('dsads'+id)
    document.querySelector('form[name="alumno_'+id+'"]').submit()
}