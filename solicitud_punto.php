<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&family=Raleway:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/materialize-change.css">
    <title>Solicitud</title>
</head>

<body class="amber lighten-5">
    <nav class="amber darken-2">
        <div class="nav-wrapper container nav-fixed">
            <a href="#" class="left large">
                <div style="transform: scale(1.5);">
                    <h6 style="display: inline; font-size: 1.3rem; font-weight: bold;">Logo</h6>
                    <i class="material-icons left">pets</i>
                </div>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown-registro">
                        <i class="material-icons left">sentiment_very_satisfied</i>
                        <h6 style="display: inline; font-size: 1.3rem; font-weight: bold;">Usuario</h6>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <ul id="dropdown-registro" class="dropdown-content orange lighten-5">
        <li>
            <a href="./registros.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Mis puntos</h6>
                <i class="material-icons">room</i>
            </a>
        </li>
        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./solicitud_punto.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Nueva solicitud</h6>
                <i class="material-icons">send</i>
            </a>
        </li>
        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./PHP/cerrar.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Cerrar sesi??n</h6>
                <i class="material-icons">power_settings_new</i>
            </a>
        </li>
    </ul>

    <div class="container section">
        <div class="card" id="map-container">
            <div class="card-content center">
                <div class="row">
                    <h1 class="" style="font-weight: 500;">ENVIAR SOLICITUD</h1>
                </div>
                <form action="./PHP/solicitar_registro.php" method="POST">
                    <div class="row">
                        <div class="carousel carousel-slider center">
                            <div class="carousel-item" href="#one!" id="one-page">
                                <div class="container">
                                    <div class="col s12">
                                        <h2 class="white-text" style="font-size: 2.5rem;">ELIGE UNA UBICACI??N</h2>
                                    </div>
                                    <div class="col s1 m2"></div>
                                    <div class="col s10 m8">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item white-text" id="two-page" href="#two!">
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12">
                                            <h2 class="white-text" style="font-size: 2.5rem;">INGRESA LOS DATOS DE UNA UBICACI??N</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s2"></div>
                                        <div class="col s8">
                                            <div class="input-field input-change">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input name="ciudad" id="ciudad-solicitud" type="text" class="validate">
                                                <label for="ciudad-solicitud">Ciudad</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s2"></div>
                                        <div class="col s8">
                                            <div class="input-field input-change">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input name="direccion" id="dir-solicitud" type="text" class="validate">
                                                <label for="dir-solicitud">Direcci??n</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light amber darken-2 modal-trigger">
                        Solicitar
                        <i class="material-icons right">send</i>
                    </button>
                </form>

                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4>Solicitud enviada</h4>
                        <p class="flow-text">Su solicitud ha sido enviada correctamente</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="modal-close waves-effect waves-green btn-flat" id="cerrar-modal">
                            Ok
                            <i class="material-icons right">done_all</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./JS/solicitud_punto.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcXdLmbQdY-ve4xLU9IxpgTptbdnbb35c&callback=iniciarMap"></script>
    <script>
        var modalCra = document.getElementById('modal2');
        var instance = M.Modal.init(modalCra);

        const botonCerrarModal = document.getElementById('cerrar-modal');
        botonCerrarModal.onclick = function() {
            instance.close();
        }
    </script>
    <?php if ($_GET["send"] == 1) : ?>
        <?php
        echo '<script>
                window.onload = function() {
                    instance.open();
                };
            </script>'
        ?>
    <?php endif ?>
</body>

</html>