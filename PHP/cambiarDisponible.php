<?php
session_start();
include_once 'conexion.php';

$page = $_GET['page'];
$id = $_GET['id'];
$opc = $_GET['opc'];

$sql = $opc ? 'UPDATE `registros` SET `disponibilidad`=0 WHERE id=?' : 'UPDATE `registros` SET `disponibilidad`=1 WHERE id=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

//Cerrar la sentencia y la conexión a la base de datos
$sentencia = null;
$pdo = null;

//Redireccionamos a registros.php
if ($page == "1") {
    header('location: ../puntos.php?tabla=1');
} else {
    header('location: ../registros.php');
}
