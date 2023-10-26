<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

// if(isset($_GET['id'])){
//     $id = htmlspecialchars($_GET["id"]);
// }
$id = htmlspecialchars($_GET["id"]);

try{
    $stmt = $conn->prepare("
        SELECT id_evento, propietario_reserva, fecha, hora, ubicacion, capacidad_maxima, tipo_evento 
        FROM evento
        WHERE id_evento = $id");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

    $eventos = $stmt->fetch();

    $propietario_reserva = $eventos["propietario_reserva"];
    $fecha = $eventos["fecha"];
    $hora = $eventos["hora"];
    $ubicacion = $eventos["ubicacion"];
    $capacidad_maxima = $eventos["capacidad_maxima"];
    $tipo_evento = $eventos["tipo_evento"];


} catch (PDOException){
    echo "No se pudo conectar con la base de datos.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    extract($_POST);

    try{$stmt = $conn->prepare("
            UPDATE evento SET 
                propietario_reserva = '$propietario_reserva',
                fecha = '$fecha',
                hora = '$hora',
                ubicacion = '$ubicacion',
                capacidad_maxima = '$capacidad_maxima',
                tipo_evento = '$tipo_evento'

            WHERE id_evento = $id
        ");

        $stmt->execute();
        header('Location: ../tablas/tablaeventos.php');
    } catch (PDOException $e){
        echo $e ;
    }
}

?>
<head>
    <title>Editar información del evento</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Editar información del evento</h1>
<button class="btn btn-primary form-control"><a href="../login/sesionusuario.php">Volver a inicio</a></button>
<form class="form" action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
<div class="col-6">
    <label for="propietario_reserva">Propietario de la reserva</label>
    <input type="text" name="propietario_reserva" value="<?= $propietario_reserva ?>" required>
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
<button type="submit" class="form-control btn btn-primary">Guardar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>