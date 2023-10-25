<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

// if(isset($_GET['id'])){
//     $id = htmlspecialchars($_GET["id"]);
// }
$id = htmlspecialchars($_GET["id"]);

try{
    $stmt = $conn->prepare("
        SELECT id_evento, nombre, fecha, hora, ubicacion, capacidad_maxima, tipo_evento 
        FROM evento
        WHERE id_evento = $id");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

    $eventos = $stmt->fetch();

    $nombre = $eventos["nombre"];
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
                nombre = '$nombre',
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
<title>Editar información del evento</title>
<link rel="stylesheet" href="style.css">
<body>
<form action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
<div>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= $nombre ?>" required>
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
<button type="submit" class="envio">Guardar</button>
</form>

</body>