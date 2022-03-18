<?php

session_start();

include_once 'conexion.php';

$usuario_login = $_POST['usuario'];
$contrasena_login = $_POST['contra'];

echo '<pre>';
var_dump($usuario_login);
var_dump($contrasena_login);
echo '</pre>';

//Verificar si usuario existe
$sql = 'SELECT * FROM datos_personales WHERE correo = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch();

// echo '<pre>';
// var_dump($resultado);
// echo '</pre>';

if (!$resultado) {
    //Matar la operación
    echo 'No existe el usuario';
    die();
}

// echo '<pre>';
// var_dump($resultado['contrasena']);
// echo '</pre>';

if (password_verify($contrasena_login, $resultado['contrasena'])) {
    $_SESSION['admin'] = $usuario_login;
    header('location: ../registros.php');
} else {
    // echo '
    // <h1>Re gei pe</h1>
    // ';
    // die();
    $_POST['usuario'] = $usuario_login;
    header('location: ../inicio_sesion.php');
}
