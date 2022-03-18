<?php
session_start();
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
    <title>Registro</title>
</head>

<body class="amber lighten-5">
    <nav class="amber darken-2">
        <div class="nav-wrapper container nav-fixed">
            <a href="index.html" class="left">
                <div style="transform: scale(1.5);">
                    <h6 style="display: inline; font-size: 1.3rem; font-weight: bold;">Logo</h6>
                    <i class="material-icons left">pets</i>
                </div>
            </a>
            <ul class="right">
                <li>
                    <a href="inicio_sesion.php" class="">
                        <h6 style="display: inline; font-size: 1.5rem; font-weight: 500;">Inicia sesión</h6>
                        <i class="material-icons right" style="transform: scale(1.3);">input</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php if (!($_GET["opc"] == null)) : ?>
        <?php if ($_GET["opc"] == 1) : ?>
            <div class="container section " id="advertencia">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel  red lighten-5">
                            <span class="red-text">
                                <h5>
                                    El e-mail que está ingresando ya está registrado.
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($_GET["opc"] == 2) : ?>
            <div class="container section " id="advertencia">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel  red lighten-5">
                            <span class="red-text">
                                <h5>
                                    La contraseña debe ser igual en ambos campos.
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
    <div class="container section" id="sec-reg">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s6">
                        <h2 class="orange-text text-darken-2 center">Registro</h2>
                        <form id="form" action="./PHP/agregar_usuario.php" method="POST">
                            <div class="row">
                                <div class="input-field col s6 input-change">
                                    <i class="material-icons prefix">person_outline</i>
                                    <input name="nombres" id="nombres" type="text" class="validate" value="<?php echo $_GET['nom']; ?>" required>
                                    <label for="nombres">Nombres</label>
                                </div>
                                <div class="input-field col s6 input-change">
                                    <i class="material-icons prefix">person_outline</i>
                                    <input name="apellidos" id="apellidos" type="text" class="validate" value="<?php echo $_GET['ap']; ?>" required>
                                    <label for="apellidos">Apellidos</label>
                                </div>
                                <div class="input-field col s6 input-change">
                                    <i class="material-icons prefix">location_city</i>
                                    <input name="residencia" id="residencia" type="text" class="validate" value="<?php echo $_GET['res']; ?>" required>
                                    <label for="residencia">Lugar de residencia</label>
                                </div>
                                <div class="input-field col s6 input-change">
                                    <i class="material-icons prefix">cake</i>
                                    <input name="nacimiento" type="text" class="datepicker" id="nacimiento" value="<?php echo $_GET['na']; ?>" required>
                                    <label for="nacimiento">Fecha de nacimiento</label>
                                </div>
                                <div class="col s12">
                                    <div class="input-field input-change">
                                        <i class="material-icons prefix">home</i>
                                        <input name="direccion" type="text" class="validate" id="direccion" value="<?php echo $_GET['dir']; ?>" required>
                                        <label for="direccion">Dirección</label>
                                    </div>
                                    <div class="input-field input-change">
                                        <i class="material-icons prefix">mail_outline</i>
                                        <input name="correo" type="email" id="usuario-registro" class="validate" value="<?php echo $_GET['cor']; ?>" required>
                                        <label for="usuario-registro">E-mail</label>
                                    </div>
                                    <div class="input-field input-change">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input name="contra" type="password" id="contra-registro" class="validate" required>
                                        <label for="contra-registro">Contraseña</label>
                                    </div>
                                    <div class="input-field input-change">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input name="contra2" type="password" id="contra-registro-2" class="validate" required>
                                        <label for="contra-registro-2">Confirmar contraseña</label>
                                    </div>
                                </div>
                            </div>
                            <div class="container center-align">
                                <button class="btn center orange darken-2 waves-effect waves-light modal-trigger" style="transform: scale(1.1); font-size: 1.1rem;">
                                    Registrarse
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="col s6">
                        <img src="./src/dog1.jpg" alt="" class="responsive-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Registro exitoso</h4>
            <p class="flow-text">Sus datos se han registrado correctamente</p>
        </div>
        <div class="modal-footer">
            <a href="./registros.php" class="modal-close waves-effect waves-green btn-flat">
                Genial
                <i class="material-icons right">done_all</i>
            </a>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                yearRange: [1920, 2022],
                autoClose: true,
                format: 'yyyy-mm-dd'
            });
            var elems2 = document.querySelectorAll('.modal');
            var instances2 = M.Modal.init(elems2, {});
        });

        var modalCra = document.getElementById('modal2');
        var instance = M.Modal.init(modalCra);
    </script>
    <?php if ($_GET["opc"] == 3) : ?>
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