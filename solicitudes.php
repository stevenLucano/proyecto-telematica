<?php

session_start();
include_once './PHP/conexion.php';

//Llamar los datos de la tabla solicitudes
$sql = 'SELECT * FROM solicitudes';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultado = $sentencia->fetchAll();

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
    <title>Solicitudes</title>
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

    <h1 class="center">Solicitudes</h1>
    <div class="container section">
        <div class="card">
            <div class="card-content">
                <table class="centered">
                    <tr>
                        <th class="center-align">ID</th>
                        <th class="center-align">Nombre</th>
                        <th class="center-align">Ubicación</th>
                        <th class="center-align">Dirección</th>
                        <th colspan="2" class="center-align">Opciones</th>
                        <th class="center-align">Eliminar</th>
                    </tr>
                    <?php foreach ($resultado as $solicitud) : ?>
                        <tr>
                            <td><?php echo $solicitud['id_solicitud'] ?></td>
                            <td><?php echo $solicitud['nombre'] ?></td>
                            <td><?php echo $solicitud['ciudad'] ?></td>
                            <td><?php echo $solicitud['direccion'] ?></td>
                            <?php if ($solicitud['aceptada'] == 2) : ?>
                                <td>
                                    <a class="btn green waves-effect waves-light modal-trigger" href="./PHP/estadoSolicitud.php?id=<?php echo $solicitud['id_solicitud']; ?>&opc=1">
                                        <i class="material-icons">check</i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn red waves-effect waves-light modal-trigger" href="./PHP/estadoSolicitud.php?id=<?php echo $solicitud['id_solicitud']; ?>&opc=0">
                                        <i class="material-icons">close</i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn disabled">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            <?php elseif ($solicitud['aceptada'] == 0) : ?>
                                <td colspan="2">
                                    <button class="btn disabled">
                                        RECHAZADA
                                    </button>
                                </td>
                                <td>
                                    <a class="btn red waves-effect waves-light modal-trigger" href="./PHP/eliminarSolicitud.php?id=<?php echo $solicitud['id_solicitud']; ?>">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            <?php elseif ($solicitud['aceptada'] == 1) : ?>
                                <td colspan="2">
                                    <button class="btn disabled">
                                        ACEPTADA
                                    </button>
                                </td>
                                <td>
                                    <a class="btn red waves-effect waves-light modal-trigger" href="./PHP/eliminarSolicitud.php?id=<?php echo $solicitud['id_solicitud']; ?>">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                coverTrigger: false,
                constrainWidth: false
            });

            var elems2 = document.querySelectorAll('.modal');
            var instances2 = M.Modal.init(elems2, {});
        });
    </script>
</body>

</html>