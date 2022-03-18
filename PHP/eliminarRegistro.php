<?php

session_start();
include_once 'conexion.php';

$id = $_GET['id'];

//Preparamos la sentencia
$sql = 'DELETE FROM `registros` WHERE id=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($id));

//Cerrar la sentencia y la conexión a la base de datos
$sentencia = null;
$pdo = null;

//Redireccionamos a registros.php
header('location: ../registros.php');
