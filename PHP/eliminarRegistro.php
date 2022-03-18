<?php

session_start();
include_once 'conexion.php';

$id = $_GET['id'];
$opc = $_GET['opc'];

//Eliminar los informes pertenecientes a ese registro
$sql_infos = 'DELETE FROM `informes` WHERE id_registro=?';
$sentencia_infos = $pdo->prepare($sql_infos);
$sentencia_infos->execute(array($id));

//Se procede a borrar el registro
$sql = 'DELETE FROM `registros` WHERE id=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

//Cerrar la sentencia y la conexión a la base de datos
$sentencia_infos = null;
$sentencia = null;
$pdo = null;

if ($opc == 1) {
    //Redireccionamos a puntos.php
    header('location: ../puntos.php?tabla=1');
} else {
    //Redireccionamos a registros.php
    header('location: ../registros.php');
}
