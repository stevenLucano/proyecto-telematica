<?php

include_once 'conexion.php';

//Capturar datos por post
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$nacimiento = $_POST['nacimiento'];
$residencia = $_POST['residencia'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$contrasena = $_POST['contra'];
$contrasena2 = $_POST['contra2'];

//Verificar si usuario existe
$sql = 'SELECT * FROM datos_personales WHERE correo = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();

if ($resultado) {
    header('location: ../cuenta_nueva.php?opc=1&nom=' . $nombres .
        '&ap=' . $apellidos .
        '&na=' . $nacimiento .
        '&res=' . $residencia .
        '&dir=' . $direccion);
    die();
}

$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

//Verificar contraseña
if (password_verify($contrasena2, $contrasena)) {
    $sql_agregar = 'INSERT INTO `datos_personales`(`nombres`, `apellidos`, `nacimiento`, `residencia`, `direccion`, `correo`, `contrasena`) VALUES (?,?,?,?,?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);

    if ($sentencia_agregar->execute(array(
        $nombres,
        $apellidos,
        $nacimiento,
        $residencia,
        $direccion,
        $correo,
        $contrasena
    ))) {
        //Cerrar la conexión base de datos y sentencia
        $sentencia_agregar = null;
        $pdo = null;
        $_SESSION['admin'] = $correo;
        header('location: ../cuenta_nueva.php?opc=3');
    } else {
        echo 'Error<br>';
    }
} else {
    header('location: ../cuenta_nueva.php?opc=2&nom=' . $nombres .
        '&ap=' . $apellidos .
        '&na=' . $nacimiento .
        '&res=' . $residencia .
        '&dir=' . $direccion .
        '&cor=' . $correo);
}
