video = document.getElementById("video"),
canvas = document.getElementById("canvas")

window.addEventListener("click", function(event){
    console.log(event.target.id)
    if(event.target.id == 'tomar_foto') iniciar_camara(event)
    // if(event.target.id == 'close'){
    //     document.querySelector(".modalDialog").setAttribute('style','display:none !important;opacity:0;')
    // }
    // if(event.target.id != 'boton') return
})
document.addEventListener('keyup', function (event) {
    if(event.keyCode == 84) foto_base64()
    if(event.keyCode == 27) document.querySelector(".modalDialog").setAttribute('style','display:none !important;opacity:0;')
})
document.addEventListener('change', function (event) {
    if(event.target.id != 'fotoPerfil') return     

    var file = document.querySelector('#fotoPerfil').files[0],
    reader = new FileReader()

    reader.readAsDataURL(file);

    reader.onload = function () {
        document.querySelector('#id_perfil').setAttribute('src', reader.result)
        document.querySelector('#foto_base64').value = reader.result
    }
    reader.onerror = function (error) {
        console.log('Error: ', error);
    }
})

function iniciar_camara(event){
    document.querySelector(".modalDialog").setAttribute('style','display:block;opacity:1;')
    
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
                video.srcObject = stream;
                video.play();
            }, function (error) {
                console.log("Permiso denegado o error: ", error);
            });
    } else {
        alert("Lo siento. Tu navegador no soporta esta característica");
    }
}
function foto_base64(){
    console.log(document.querySelector(".modalDialog").style.display)
    if(document.querySelector(".modalDialog").style.display == "none") return
    //Pausar reproducción
    video.pause();
 
    //Obtener contexto del canvas y dibujar sobre él
    var contexto = canvas.getContext("2d");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    contexto.drawImage(video, 0, 0, canvas.width, canvas.height);
 
    var foto = canvas.toDataURL(); //Esta es la foto, en base 64

    document.querySelector('#id_perfil').setAttribute('src', foto)
    document.querySelector('#foto_base64').value = foto
    document.querySelector(".modalDialog").setAttribute('style','display:none !important;opacity:0;')

    //Reanudar reproducción
    video.play();
}

