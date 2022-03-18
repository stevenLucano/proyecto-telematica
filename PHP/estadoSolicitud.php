<?php
session_start();

include_once 'conexion.php';

$id = $_GET['id'];
$opc = $_GET['opc'];

//Se actualiza el estado de la solicitud
$sql = 'UPDATE `solicitudes` SET `aceptada`=' . $opc . ' WHERE id_solicitud=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

if ($opc == 1) {
    //Se llama la solicitud para obtener los datos
    $sql_solicitud = 'SELECT * FROM `solicitudes` WHERE id_solicitud = ?';
    $sentencia_sol = $pdo->prepare($sql_solicitud);
    $sentencia_sol->execute(array($id));
    $res = $sentencia_sol->fetchAll();

    $sql_agregar = 'INSERT INTO `registros`(`ciudad`, `direccion`, `disponibilidad`, `id_persona`) VALUES (?,?,1,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($res[0]['ciudad'], $res[0]['direccion'], $res[0]['id_persona']));

    $sentencia_sol = null;
    $sentencia_agregar = null;
}

//Cerrar la sentencia y la conexión a la base de datos

$sentencia = null;
$pdo = null;

//Redireccionamos a registros.php
header('location: ../solicitudes.php');
