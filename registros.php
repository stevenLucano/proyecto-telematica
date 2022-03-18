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
    <link rel="shortcut icon" href="#">

    <title>Registros</title>
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

        <?php if ($_SESSION['admin'] == "admin@gmail.com") : ?>
            <!-- <li class="divider orange lighten-3"></li> -->
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
        <?php else : ?>
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
        <?php endif ?>

        <li class="divider orange lighten-3"></li>
        <li>
            <a href="./PHP/cerrar.php" class="amber-text text-darken-4">
                <h6 style="display: inline; font-size: 1.1rem; font-weight: bold;">Cerrar sesión</h6>
                <i class="material-icons">power_settings_new</i>
            </a>
        </li>
    </ul>

    <?php
    //Llamar los datos pertenecientes al $_SESSION['admin'];
    $sql_session = 'SELECT * FROM datos_personales WHERE correo = ?';
    $sentencia_session = $pdo->prepare($sql_session);
    $sentencia_session->execute(array($_SESSION['admin']));
    $resultado_session = $sentencia_session->fetchAll();

    //Llamar los datos de la tabla registros pertenecientes a $_SESSION['admin'];
    $sql_registros = 'SELECT * FROM registros WHERE id_persona = ?';
    $sentencia_registros = $pdo->prepare($sql_registros);
    $sentencia_registros->execute(array($resultado_session[0]['id']));
    $resultado_registros = $sentencia_registros->fetchAll();
    // var_dump($resultado_registros);

    ?>
    <?php if (count($resultado_registros)) : ?>
        <div class="container" style="position: relative; top: 5vh;">
            <div class="card grey darken-2 white-text">
                <div class="card-content">
                    <h1 class="center">REGISTROS REALIZADOS</h1>
                    <table class="striped centered responsive-table" id="registros">
                        <tr>
                            <th class="center-align">Punto Registrado</th>
                            <th class="center-align">Dirección</th>
                            <th class="center-align">Disponibilidad</th>
                            <th class="center-align">Eliminar registro</th>
                        </tr>
                        <?php foreach ($resultado_registros as $registro) : ?>
                            <tr>
                                <td id="r-1">#<?php echo $registro['id'] ?></td>
                                <td><?php echo $registro['direccion'] ?></td>
                                <td>
                                    <?php if ($registro['disponibilidad']) : ?>
                                        <a href="./PHP/cambiarDisponible.php?id=<?php echo $registro['id'] ?>&opc=<?php echo $registro['disponibilidad'] ?>" class="btn green waves-effect waves-light" style="width: 10rem;">Disponible</a>
                                    <?php else : ?>
                                        <a href="./PHP/cambiarDisponible.php?id=<?php echo $registro['id'] ?>&opc=<?php echo $registro['disponibilidad'] ?>" class="btn red waves-effect waves-light" style="width: 10rem;">No disponible</a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="./PHP/eliminarRegistro.php?id=<?php echo $registro['id'] ?>" class="btn red waves-effect waves-light modal-trigger" href="#modal1" id="e-01">
                                        <i class="material-icons" id="e-11">delete_forever</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container section">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel  blue lighten-5">
                        <span class="blue-text">
                            <h5>
                                No hay registros existentes. Si desea añadir un registro haga click <a href="./solicitud_punto.html"><b>aquí</b>.</a>
                            </h5>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Eliminar Registro</h4>
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
    <script src="./JS/registros.js"></script>
    <!-- <?php
            $emailPersona = $_SESSION['admin'];
            echo '<script>
            console.log(' . $_SESSION . ');
        </script>'
            ?> -->
</body>

</html>