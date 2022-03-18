<?php
include_once 'conexion.php';

$id = $_GET['id'];
// echo $id;

//Preparamos la sentencia
$sql = 'DELETE FROM `informes` WHERE id_informes=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

//Cerrar la sentencia y la conexión a la base de datos
$sentencia = null;
$pdo = null;

//Redireccionamos a registros.php
header('location: ../informes.php');
