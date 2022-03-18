<?php
session_start();
include_once 'conexion.php';
if ($_POST) {
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];

    //Llamar los datos pertenecientes al $_SESSION['admin'];
    $sql_session = 'SELECT * FROM datos_personales WHERE correo = ?';
    $sentencia_session = $pdo->prepare($sql_session);
    $sentencia_session->execute(array($_SESSION['admin']));
    $resultado_session = $sentencia_session->fetchAll();

    //Preparar la sentencia para agregar solicitud
    $sql_solicitud = "INSERT INTO `solicitudes`(`nombre`,`ciudad`, `direccion`, `aceptada`, `id_persona`) VALUES (?,?,?,2,?)";
    $sentencia_solicitud = $pdo->prepare($sql_solicitud);
    $sentencia_solicitud->execute(array($resultado_session[0]['nombres'], $ciudad, $direccion, $resultado_session[0]['id']));
    //Cerrar la sentencia y conexión de base de datos
    $sentencia_session = null;
    $sentencia_solicitud = null;
    $pdo = null;
    //Redireccionar
    header('location: ../solicitud_punto.php?send=1');
} else {
    echo 'Ocurrio un error';
}
