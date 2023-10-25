<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

$id = htmlspecialchars($_GET["id"]);

try{
    $stmt = $conn->prepare("
        DELETE FROM evento WHERE id_evento = $id
    ");

    $stmt->execute();
    
    header('Location: ../tablas/tablaeventos.php');

} catch (PDOException){
    echo "No se pudo eliminar el registro";
}