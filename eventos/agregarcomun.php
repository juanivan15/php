<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

$propietario_reserva = "";
$fecha = "";
$hora = "";
$ubicacion = "";
$capacidad_maxima = "";
$tipo_evento = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $propietario_reserva = $_POST['propietario_reserva'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $ubicacion = $_POST['ubicacion'];
    $capacidad_maxima = $_POST['capacidad_maxima'];
    $tipo_evento = $_POST['tipo_evento'];



    try{
        $stmt = $conn->prepare("
            INSERT INTO evento SET 
                propietario_reserva = '$propietario_reserva',
                fecha = '$fecha',
                hora = '$hora',
                ubicacion = '$ubicacion',
                capacidad_maxima = '$capacidad_maxima',
                tipo_evento = '$tipo_evento'
            ");

        $stmt->execute();

        header('Location: ../reserva.php');
    } catch (PDOException $e){
        echo $e ;
    }



}

?>
<head>
    <title>Agregar nuevo evento</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Agregar un nuevo evento</h1>
    <a href="../index.php">Volver a Inicio</a>
    <br><br>
<form class="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
<div class="row">
    <div class="col-6">
        <label for="propietario_reserva">Propietario de la reserva</label>
        <input type="text" class="form-control" name="propietario_reserva" value="<?= $propietario_reserva ?>" required>
    </div>
    <div class="col-6">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?= $fecha ?>" required>
    </div>
    <div class="col-6">
        <label for="hora">Hora</label>
        <input type="text" class="form-control" name="hora" value="<?= $hora ?>" required>
    </div>
    <div class="col-6">
        <label for="ubicacion">Ubicacion</label>
        <input type="text" class="form-control" name="ubicacion" value="<?= $ubicacion ?>" required>
    </div>
    <div class="col-6">
        <label for="capacidad_maxima">Capacidad Máxima</label>
        <input type="text" class="form-control" name="capacidad_maxima" value="<?= $capacidad_maxima ?>" required>
    </div>
    <div class="col-6">
        <label for="tipo_evento">Tipo</label>
        <select class="form-control" id="tipo_evento" name="tipo_evento">
                <option value="casamiento">Casamiento</option>
                <option value="cumpleaños">Cumpleaños</option>
                <option value="comunion">Comunión</option>
        </select>
    </div>
    <button type="submit" class="form-control btn btn-primary">Reservar</button>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>