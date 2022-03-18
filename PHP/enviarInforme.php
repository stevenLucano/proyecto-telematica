<?php
include_once 'conexion.php';

if ($_POST) {
    $info = $_POST['informe'];
    $id = $_POST['id-info'];

    // //Llamar los datos pertenecientes al $_SESSION['admin'];
    $sql_registro = 'SELECT * FROM registros WHERE id=?';
    $sentencia_registro = $pdo->prepare($sql_registro);
    $sentencia_registro->execute(array($id));
    $resultado_registro = $sentencia_registro->fetchAll();

    //Preparar la sentencia para agregar el informe
    $sql_info = "INSERT INTO `informes`(`direccion`, `informe`, `id_registro`) VALUES (?,?,?)";
    $sentencia_info = $pdo->prepare($sql_info);
    $sentencia_info->execute(array($resultado_registro[0]['direccion'], $info, $id));

    //Cerrar la sentencia y conexión de base de datos
    $sentencia_registro = null;
    $sentencia_info = null;
    $pdo = null;
    //Redireccionar
    header('location: ../puntos.php?tabla=1');
}
