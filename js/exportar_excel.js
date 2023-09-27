function exportarExcel(name = ''){
    try {
        let tabla = document.querySelector('#tabla_alumnos'),
        th = '',
        tr = tabla.childNodes[3].getElementsByTagName("tr"),
        data = [],titles = [], row = []

        try {
            th = tabla.childNodes[1].childNodes[3].getElementsByTagName("th")
        } catch (error) {
            th = tabla.childNodes[1].childNodes[1].getElementsByTagName("th")
        }

        for (let i = 0; i < th.length; i++) {
            titles.push(th[i].innerText.toUpperCase());
        }
        data.push(titles)

        let valor = ''
        for (let e = 0; e < tr.length; e++) {
            row = []
            for (let d = 0; d < tr[e].getElementsByTagName("td").length; d++) {
                valor = tr[e].getElementsByTagName("td")[d].innerText
                row.push(valor.replace(/\n/g, " "))
            }
            data.push(row)
        }
        // (C2) CREATE NEW EXCEL "FILE"
        let workbook = XLSX.utils.book_new(),
        worksheet = XLSX.utils.aoa_to_sheet(data);
        // ANCHO DE COLUMNAS
        var wscols = [
            { wch: 20 },
            { wch: 20 },
            { wch: 5 }, 
            { wch: 100 }
        ];
        worksheet['!cols'] = wscols;
        workbook.SheetNames.push("First");
        workbook.Sheets["First"] = worksheet;
    
        // (C3) TO BINARY STRING
        let xlsbin = XLSX.write(workbook, {
        bookType: "xlsx",
        type: "binary"
        });
    
        // (C4) TO BLOB OBJECT
        let buffer = new ArrayBuffer(xlsbin.length),
            array = new Uint8Array(buffer);
        for (let i = 0; i < xlsbin.length; i++) {
        array[i] = xlsbin.charCodeAt(i) & 0XFF;
        }
        let xlsblob = new Blob([buffer], {type:"application/octet-stream"});
    
        // (C5) "FORCE DOWNLOAD"
        let url = window.URL.createObjectURL(xlsblob),
        anchor = document.createElement("a");
        anchor.href = url;
        anchor.download = "datos_"+name+".xlsx";
        anchor.click();
        window.URL.revokeObjectURL(url);
    } catch (error) {
        console.log(error)
        alert('No se encontro tabla.')
    }
}
// CREO EL LOADER PARA CUANDO ESTA CARGARNDO
function crearLoader(){
    document.getElementById('loader').innerHTML = `<div class="loader m-t-2 p-t-2">
    <div class="spinner"></div>
    <div class="spinner"></div>
    <div class="spinner"></div>
    <div class="spinner"></div>
    <div class="spinner"></div>
    <div class="spinner"></div>

    </div>`
}
// ELIMINO EL LOADER
function eliminarLoader(){
    var loader = document.getElementById("loader")
    loader.removeChild(loader.childNodes[0])
}