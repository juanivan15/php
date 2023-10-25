<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos: tabla</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Eventos guardados</h1>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ubicacion</th>
            <th>Capacidad Máxima</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id_evento, nombre, fecha, hora, ubicacion, capacidad_maxima, tipo_evento FROM evento");

                $stmt->execute();
            
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   
            
                $eventos = $stmt->fetchAll();
            ?>
            <?php foreach($eventos as $evento): ?>
                <tr>
                    <td><?= $evento['nombre'] ?></td>
                    <td><?= $evento['fecha'] ?></td>
                    <td><?= $evento['hora'] ?></td>
                    <td><?= $evento['ubicacion'] ?></td>
                    <td><?= $evento['capacidad_maxima'] ?></td>
                    <td><?= $evento['tipo_evento'] ?></td>
                    <td>
                        <button><a href="../eventos/editar.php?id=<?=$evento['id_evento']?>">Editar</a></button>
                        <button><a href="../eventos/eliminar.php?id=<?=$evento['id_evento']?>">Eliminar</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>




        </tbody>
        
    </table>
    <button><a href="../eventos/agregar.php">Nuevo Evento</a></button>
</body>
</html>