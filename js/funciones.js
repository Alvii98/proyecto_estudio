


function camara(){
    let video = document.getElementById("video"),
    canvas = document.getElementById("canvas"),
    boton = document.getElementById("boton"),
    estado = document.getElementById("estado");

    function tieneSoporteUserMedia(){
        return !!(navigator.getUserMedia || (navigator.mozGetUserMedia ||  navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
    }
    function _getUserMedia(){
        return (navigator.getUserMedia || (navigator.mozGetUserMedia ||  navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments)
    }


    if (tieneSoporteUserMedia()) {
        _getUserMedia(
            {video: true},
            function (stream) {
                console.log("Permiso concedido");
                document.getElementById("video").srcObject = stream;
                document.getElementById("video").play();
            }, function (error) {
                console.log("Permiso denegado o error: ", error);
            });
    } else {
        alert("Lo siento. Tu navegador no soporta esta característica");
    }
}
window.addEventListener("click", function(event){
    if(event.target.id != 'boton') return
    //Pausar reproducción
    document.getElementById("video").pause();
 
    //Obtener contexto del canvas y dibujar sobre él
    var contexto = document.getElementById("canvas").getContext("2d");
    document.getElementById("canvas").width = document.getElementById("video").videoWidth;
    document.getElementById("canvas").height = document.getElementById("video").videoHeight;
    contexto.drawImage(document.getElementById("video"), 0, 0, document.getElementById("canvas").width, document.getElementById("canvas").height);
 
    var foto = document.getElementById("canvas").toDataURL(); //Esta es la foto, en base 64
    document.getElementById("estado").innerHTML = "Enviando foto. Por favor, espera...";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./guardar_foto.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(encodeURIComponent(foto)); //Codificar y enviar
 
    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            console.log("La foto fue enviada correctamente");
            estado.innerHTML = "Foto guardada con éxito. Puedes verla <a target='_blank' href='./" + xhr.responseText + "'> aquí</a>";
        }
    }
 
    //Reanudar reproducción
    document.getElementById("video").play();
})



