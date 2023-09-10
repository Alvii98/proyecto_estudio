<header class="container-fluid border-top border-color pt-2 pb-2">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 float-left mt-2">
                <div class="col-md-12">
                    <img src="img/logo-Negro.png" role="button" onclick="location.href='index.php'" width="300px" height="60px">
                </div>
            </div>
            <div class="col-md-4 float-left mt-2 ml-4">
                <div class="col-md-12">
                    <label class="h6">Url externa <i class="bi bi-link"></i></label>
                </div>
                <div class="col-md-12">
                    <a class="h6" target="_blank" href="http://<?php print gethostbyname(gethostname());?>/proyecto_estudio/">
                        <?php print gethostbyname(gethostname());?>/proyecto_estudio/
                    </a>
                </div>
            </div>
            <div class="col-md-3 float-left ml-4">
                <div class="col-md-12">
                    <label class="h6">Datos del desarrollador <i class="bi bi-laptop-fill"></i></label>
                </div>
                <div class="col-md-12">
                    <i class="bi bi-envelope h2 mr-5" onclick="location.href='mailto:alvaro.98@live.com.ar'"></i>
                    <i class="bi bi-linkedin h2 mr-5" onclick="window.open('https://www.linkedin.com/in/alvaro-caporaletti-68a104207/', '_blank')"></i>
                    <i class="bi bi-whatsapp h2" onclick="window.open('https://api.whatsapp.com/send?phone=5492346571470', '_blank')"></i>
                </div>
            </div>
        </div>
    </div>
</header>