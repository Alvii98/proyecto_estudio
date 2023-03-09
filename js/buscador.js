document.addEventListener('keyup', function (event) {
    // buscar()
})
document.addEventListener('click', function (event) {
    if(event.target.id != 'buscar') return
    buscar()
})
function buscar(){

    var apellido, nombre, actividad, edad, table, tr, td,td1,td2, columna, td_cont, td_none

    apellido = document.querySelector('#apellido').value.toUpperCase() //Parametro pasado a mayuscula
    nombre = document.querySelector('#nombre').value.toUpperCase() //Parametro pasado a mayuscula
    actividad = document.querySelector('#actividad').value.toUpperCase() //Parametro pasado a mayuscula
    edad = document.querySelector('#edad').value.toUpperCase() //Parametro pasado a mayuscula
    table = document.querySelector('table')
    tr = table.getElementsByTagName("tr") 
    //columna = event.target.parentNode.querySelector('select').value //Culumna en cual va a hacer la busqueda
    td_cont = 0
    td_none = 0

    // recorre todos los tr
    for (let i = 0; i < tr.length; i++) {
        // Elemento td de la columna seleccionada
        td = tr[i].getElementsByTagName("td")[0]
        td1 = tr[i].getElementsByTagName("td")[1]
        td2 = tr[i].getElementsByTagName("td")[2]
        if (td || td1 || td2) {
            td_cont++
            //indexOf() retorna el indice donde se encuentra la palaba(filter) o -1 si no esta
            if (td.innerHTML.toUpperCase().indexOf(apellido) > -1) {
                tr[i].style.display = ""
            } else if(td.innerHTML.toUpperCase().indexOf(nombre) > -1){
                tr[i].style.display = ""
            } else if(td2.innerHTML.toUpperCase().indexOf(actividad) > -1){
                tr[i].style.display = ""
            } else {
                td_none++
                tr[i].style.display = "none"
            }
        }
    }
    // td_cont va a contar todos los td y td_none va a contar todos los que puso en none
    // si son iguales es porque no encontro ningun dato con los parametros
    if(td_cont == td_none){
        console.log('No se encontraron datos.')
    }
}
    