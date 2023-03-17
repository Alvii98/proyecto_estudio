function camara(event){
    document.querySelector(".modalDialog").setAttribute('style','display:block !important;opacity:1;')
    
    video = document.getElementById("video"),
    canvas = document.getElementById("canvas"),
    boton = document.getElementById("boton")
    
    function tieneSoporteUserMedia(){
        return !!(navigator.getUserMedia || (navigator.mozGetUserMedia ||  navigator.mediaDevsices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
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
    console.log(event.target.id)
    if(event.target.id == 'tomar_foto') camara(event)
    if(event.target.id == 'close'){
        document.querySelector(".modalDialog").setAttribute('style','display:none !important;opacity:0;')
    }
    if(event.target.id != 'boton') return
    //Pausar reproducción
    document.getElementById("video").pause();
 
    //Obtener contexto del canvas y dibujar sobre él
    var contexto = document.getElementById("canvas").getContext("2d");
    document.getElementById("canvas").width = document.getElementById("video").videoWidth;
    document.getElementById("canvas").height = document.getElementById("video").videoHeight;
    contexto.drawImage(document.getElementById("video"), 0, 0, document.getElementById("canvas").width, document.getElementById("canvas").height);
 
    var foto = document.getElementById("canvas").toDataURL(); //Esta es la foto, en base 64
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./guardar_foto.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(encodeURIComponent(foto)); //Codificar y enviar
 
    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            console.log("La foto fue enviada correctamente");
            console.log(foto)
        }
    }
 
    //Reanudar reproducción
    document.getElementById("video").play();
})

document.addEventListener('keyup', function (event) {
    console.log(event.keyCode)
    if(event.keyCode != 27) return
    document.querySelector(".modalDialog").setAttribute('style','display:none !important;opacity:0;')
})

