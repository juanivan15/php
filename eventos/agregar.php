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

        header('Location: ../tablas/tablaeventos.php');
    } catch (PDOException $e){
        echo $e ;
    }



}

?>
<link rel="stylesheet" href="style.css">
<title>Agregar nuevo evento</title>
<body>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
<div>
    <label for="propietario_reserva">Propietario de la reserva</label>
    <input type="text" name="propietario_reserva" value="<?= $propietario_reserva ?>" required>
</div>
<div>
    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" value="<?= $fecha ?>" required>
</div>
<div>
    <label for="hora">Hora</label>
    <input type="text" name="hora" value="<?= $hora ?>" required>
</div>
<div>
    <label for="ubicacion">Ubicacion</label>
    <input type="text" name="ubicacion" value="<?= $ubicacion ?>" required>
</div>
<div>
    <label for="capacidad_maxima">Capacidad Máxima</label>
    <input type="text" name="capacidad_maxima" value="<?= $capacidad_maxima ?>" required>
</div>
<div>
    <label for="tipo_evento">Tipo</label>
    <select id="tipo_evento" name="tipo_evento">
            <option value="casamiento">Casamiento</option>
            <option value="cumpleaños">Cumpleaños</option>
            <option value="comunion">Comunión</option>
    </select>
</div>
<button type="submit" class="envio">Guardar</button>
</form>
</body>