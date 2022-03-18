<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=proyecto_telematica', "root", "root");
    // echo 'conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
