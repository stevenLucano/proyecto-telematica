<?php

session_start();
include_once './PHP/conexion.php';

//Llamar los datos pertenecientes al $_SESSION['admin'];
// $sql_session = 'SELECT * FROM datos_personales WHERE correo = ?';
// $sentencia_session = $pdo->prepare($sql_session);
// $sentencia_session->execute(array($_SESSION['admin']));
// $resultado_session = $sentencia_session->fetchAll();

//Llamar todos los registros con los nombres del donador;
$sql_registros = 'SELECT registros.id, datos_personales.nombres, datos_personales.apellidos, registros.ciudad, registros.direccion, registros.disponibilidad 
                    FROM registros 
                    INNER JOIN datos_personales 
                    ON registros.id_persona = datos_personales.id';
$sentencia_registros = $pdo->prepare($sql_registros);
$sentencia_registros->execute();
$resultado_registros = $sentencia_registros->fetchAll();

$tabla = $_GET['tabla'];
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
    <title>Puntos registrados</title>
</head>

<body class="amber lighten-5">
    <nav class="amber darken-2">
        <div class="nav-wrapper container nav-fixed">
            <a href="index.html" class="left large">
                <div style="transform: scale(1.5);">
                    <h6 style="display: inline; font-size: 1.3rem; font-weight: bold;">Logo</h6>
                    <i class="material-icons left">pets</i>
                </div>
            </a>
            <?php if ($_SESSION['admin'] == "admin@gmail.com") : ?>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown-registro">
                            <i class="material-icons left">sentiment_very_satisfied</i>
                            <h6 style="display: inline; font-size: 1.3rem; font-weight: bold;">Usuario</h6>
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </nav>
    <?php if ($_SESSION['admin'] == "admin@gmail.com") : ?>
        <ul id="dropdown-registro" class="dropdown-content orange lighten-5">
            <li class="orange lighten-5">
                <a href="./puntos.php" class="amber-text text-darken-4">
                    <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Registros</h6>
                    <i class="material-icons">room</i>
                </a>
            </li>
            <li class="divider orange lighten-3"></li>
            <li class="orange lighten-5">
                <a href="./informes.php" class="amber-text text-darken-4">
                    <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Informes</h6>
                    <i class="material-icons">report_problem</i>
                </a>
            </li>
            <li class="divider orange lighten-3"></li>
            <li class="orange lighten-5">
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
    <?php endif ?>

    <h1 class="center">Puntos Registrados</h1>
    <?php if ($tabla == 1) : ?>
        <a class="btn amber darken-3 waves-effect waves-light r-mapa" style="position: relative; left: 77vw;" id="btn-cambio">
            ver mapa
        </a>
    <?php else : ?>
        <a class="btn amber darken-3 waves-effect waves-light r-tabla" style="position: relative; left: 77vw;" id="btn-cambio">
            ver tabla
        </a>
    <?php endif ?>
    <div class="container section">
        <div class="card" id="aver">
            <div class="card-content" id="contenido">
                <div id="map1" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>

    <template id="tabla-registros">
        <table id="registros" class="centered">
            <tr>
                <th class="center-align">Punto Registrado</th>
                <th class="center-align">Donador</th>
                <th class="center-align">Ciudad</th>
                <th class="center-align">Dirección</th>
                <th class="center-align">Disponibilidad</th>
            </tr>
            <?php foreach ($resultado_registros as $registro) : ?>
                <tr>
                    <td id="r-<?php echo $registro['id'] ?>">#<?php echo $registro['id'] ?></td>
                    <td><?php echo $registro['nombres'] ?> <?php echo $registro['apellidos'] ?></td>
                    <td><?php echo $registro['ciudad'] ?></td>
                    <td><?php echo $registro['direccion'] ?></td>
                    <?php if ($_SESSION['admin'] == "admin@gmail.com") : ?>
                        <td>
                            <?php if ($registro['disponibilidad']) : ?>
                                <a href="./PHP/cambiarDisponible.php?page=1&id=<?php echo $registro['id'] ?>&opc=<?php echo $registro['disponibilidad'] ?>" class="btn green waves-effect waves-light" style="width: 10rem;">Disponible</a>
                            <?php else : ?>
                                <a href="./PHP/cambiarDisponible.php?page=1&id=<?php echo $registro['id'] ?>&opc=<?php echo $registro['disponibilidad'] ?>" class="btn red waves-effect waves-light" style="width: 10rem;">No disponible</a>
                            <?php endif ?>
                        </td>
                    <?php else : ?>
                        <td>
                            <?php if ($registro['disponibilidad']) : ?>
                                <div class="green white-text" style="width: 10rem;">
                                    <h6>Disponible</h6>
                                </div>
                            <?php else : ?>
                                <div class="red white-text" style="width: 10rem;">
                                    <h6>No disponible</h6>
                                </div>
                            <?php endif ?>
                        </td>
                        <td><a href="#modal4" class="btn red waves-effect waves-light btn-small modal-trigger" style="padding:0; width: 100%;">
                                <i class="material-icons" id="<?php echo $registro['id'] ?>">warning</i>
                            </a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </table>
    </template>

    <div id="modal4" class="modal">
        <form action="./PHP/enviarInforme.php" method="POST">
            <div class="modal-content">
                <h4>ENVIAR INFORME</h4>
                <input id="info-text" name="informe" type="text" placeholder="Escriba el informe que desee realizar">
                <input id="info-id" name="id-info" type="hidden" value="">
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-close waves-effect waves-red btn-flat">
                    Cancelar
                    <i class="material-icons right">clear</i>
                </a>
                <button class="modal-close waves-effect waves-green btn-flat">
                    Enviar
                    <i class="material-icons right">check</i>
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./JS/puntos.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcXdLmbQdY-ve4xLU9IxpgTptbdnbb35c&callback=iniciarMap"></script> -->
</body>

</html>