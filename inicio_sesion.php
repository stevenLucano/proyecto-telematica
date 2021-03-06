<!DOCTYPE html>
<html lang="es">

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

    <title>Inicio de sesión</title>
</head>

<body>
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {

        session_start();

        include_once './PHP/conexion.php';

        $usuario_login = $_POST['usuario'];
        $contrasena_login = $_POST['contra'];

        //Verificar si usuario existe
        $sql = 'SELECT * FROM datos_personales WHERE correo = ?';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($usuario_login));
        $resultado = $sentencia->fetch();

        $passTrue = 1;
        if (!$resultado) {
            echo '<script>
            console.log("El usuario no existe");
            </script>';
            header('location: ./inicio_sesion.php?var=1');
        }

        if (password_verify($contrasena_login, $resultado['contrasena'])) {
            $_SESSION['admin'] = $usuario_login;
            if ($_SESSION['admin'] == "admin@gmail.com") {
                header('location: ./puntos.php');
            } else {
                header('location: ./registros.php');
            }
        } else {
            $passTrue = 0;
        }
        $usuarioText = $_POST["usuario"];
    } else {
        $usuarioText = "";
        $passTrue = 1;
    }

    ?>
    <div class="navbar-fixed">
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
                        <div style="transform: scale(1.1);">
                            <a href="cuenta_nueva.php" class="btn waves-effect waves-light orange darken-2">
                                Registrate
                                <i class="material-icons right">person_add</i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="fondo">
        <img src="https://s1.1zoom.me/b4542/829/Dogs_Run_Bokeh_Jack_Russell_terrier_571695_1920x1080.jpg" alt="" class="">
    </div>

    <div id="fondo2" class=" amber darken-1"></div>

    <?php if ($_GET['var'] == 1) : ?>
        <div class="card-panel  red lighten-5" style="width:30vw; position: absolute; right:9vw; top:13vh; text-align:center; padding:1rem 0;">
            <span class="red-text">
                <h4>
                    El usuario no existe
                </h4>
            </span>
        </div>
    <?php endif ?>
    <?php if (!$passTrue) : ?>
        <div class="card-panel  red lighten-5" style="width:30vw; position: absolute; right:9vw; top:13vh; text-align:center; padding:1rem 0;">
            <span class="red-text">
                <h4>
                    La contraseña es incorrecta
                </h4>
            </span>
        </div>
    <?php endif ?>

    <div id="contenido-sesion" class="orange lighten-5">
        <div class="container section">
            <div class="row">
                <div class="col s3"></div>
                <div class="col s7">
                    <div class="card medium">
                        <h4 class="center-align orange-text text-darken-2">INICIAR SESIÓN</h4>
                        <form id="form" action="./inicio_sesion.php" method="POST">
                            <div class="input-field input-change">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="usuario" value="" type="email" id="usuario-input" class="validate" required>
                                <label for="usuario-input">Usuario</label>
                            </div>
                            <div class="input-field input-change">
                                <i class="material-icons prefix">lock</i>
                                <input name="contra" type="password" id="contra-input" class="validate" required>
                                <label for="contra-input">Contraseña</label>
                            </div>
                            <div class="container center-align">
                                <button class="btn center orange darken-2 waves-effect waves-light" style="transform: scale(1.1); font-size: 1.1rem;">
                                    Ingresar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var instances = M.Autocomplete.init(elems);
        });
    </script>
    <script>
        const inputUser = document.getElementById("usuario-input");
        inputUser.value = "<?php echo $usuarioText; ?>";
    </script>
</body>

</html>