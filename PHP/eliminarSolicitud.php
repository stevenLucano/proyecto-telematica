<?php
session_start();
include_once 'conexion.php';

$id = $_GET['id'];

//Eliminar la solicitud utilizando el id enviado
$sql = 'DELETE FROM `solicitudes` WHERE id_solicitud=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

//Cerrar la sentencia y la conexión a la base de datos
$sentencia = null;
$pdo = null;

header('location: ../solicitudes.php');
