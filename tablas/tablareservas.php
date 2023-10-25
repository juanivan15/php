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
    <title>Eventos: Reservas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tabla de reservas</h1>
    <table>
        <thead>
            <th>Id Usuario</th>
            <th>Id Evento</th>
            <th>Cantidad de invitados</th>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id_usuario FROM usuarios AND SELECT id_evento, capacidad_maxima FROM evento");

                $stmt->execute();
            
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   
            
                $reservas = $stmt->fetchAll();
            ?>
            <?php foreach($reservas as $reserva): ?>
                <tr>
                    <td><?= $reserva['id_usuario'] ?></td>
                    <td><?= $reserva['id_evento'] ?></td>
                    <td><?= $reserva['capacidad_maxima'] ?></td>

                    <td>
                        <button><a href="../eventos/editar.php?id=<?=$reserva['id_evento']?>">Editar</a></button>
                        <button><a href="../eventos/eliminar.php?id=<?=$reserva['id_evento']?>">Eliminar</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>




        </tbody>
        
    </table>
    <button><a href="../eventos/agregar.php">Nuevo Evento</a></button>
</body>
</html>