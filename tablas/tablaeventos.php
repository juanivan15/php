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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Eventos guardados</h1>
    <table>
        <thead>
            <th>Propietario de la reserva</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ubicacion</th>
            <th>Capacidad Máxima</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id_evento, propietario_reserva, fecha, hora, ubicacion, capacidad_maxima, tipo_evento FROM evento");

                $stmt->execute();
            
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   
            
                $eventos = $stmt->fetchAll();
            ?>
            <?php foreach($eventos as $evento): ?>
                <tr>
                    <td><?= $evento['propietario_reserva'] ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>