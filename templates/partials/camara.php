<div id="openModal" class="modalDialog">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 float-right">
                <a href="#close" title="Close" class="close">X</a>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <!-- Aquí el video embebido de la webcam  -->
                <video id="video" class="video" playsinline autoplay></video>
                <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <i class="bi bi-camera-fill" id="boton"></i>
            </div>
        </div>
    </div>
</div>