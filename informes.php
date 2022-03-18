<?php

session_start();
include_once './PHP/conexion.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&family=Raleway:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/materialize-change.css">
    <title>Informes</title>
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
            <a href="./puntos.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Registros</h6>
                <i class="material-icons">room</i>
            </a>
        </li>
        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./informes.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Informes</h6>
                <i class="material-icons">report_problem</i>
            </a>
        </li>
        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./solicitudes.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Solicitudes</h6>
                <i class="material-icons">add_location</i>
            </a>
        </li>
        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./PHP/cerrar.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Cerrar sesión</h6>
                <i class="material-icons">power_settings_new</i>
            </a>
        </li>
    </ul>

    <div class="container section" style="position: relative; top: 5vh;">
        <div class="card red lighten-5 red-text text-darken-3 hoverable">
            <div class="card-content">
                <h1 class="center">Informes</h1>
                <table class="highlight centered responsive-table" id="informes" style="font-size: 1.3rem;">
                    <tr>
                        <th class="center-align">Punto Registrado</th>
                        <th class="center-align">Dirección</th>
                        <th class="center-align">Informe</th>
                        <th class="center-align">Opciones</th>
                    </tr>
                    <tr>
                        <td id="r-1">#2134</td>
                        <td>Calle 5#4-41</td>
                        <td>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, tenetur.
                        </td>
                        <td>
                            <a class="btn red waves-effect waves-light modal-trigger" href="#modal1" id="e-01">
                                <i class="material-icons" id="e-11">delete_forever</i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Eliminar Informe</h4>
            <p class="flow-text" id="modal-e"></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-red btn-flat">
                Cancelar
                <i class="material-icons right">clear</i>
            </a>
            <a href="#" class="modal-close waves-effect waves-green btn-flat">
                Ok
                <i class="material-icons right">check</i>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- <script src="./JS/registros.js"></script> -->
    <script src="./JS/informes.js"></script>
</body>

</html>