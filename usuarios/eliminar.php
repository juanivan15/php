<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

$id = htmlspecialchars($_GET["id"]);

try{
    $stmt = $conn->prepare("
        DELETE FROM usuarios WHERE id_usuario = $id
    ");

    $stmt->execute();
    
    header('Location: ../tablas/tablausuarios.php');

} catch (PDOException){
    echo "No se pudo eliminar el registro";
}