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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tabla de reservas</h1>
<button class="btn btn-primary form-control"><a href="../login/sesionusuario.php">Volver a inicio</a></button>

    <table class="table">
        <thead>
            <th>Propietario</th>
            <th>Id Evento</th>
            <th>Cantidad de invitados</th>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT propietario_reserva, id_evento, capacidad_maxima FROM evento");

                $stmt->execute();
            
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   
            
                $reservas = $stmt->fetchAll();
            ?>
            <?php foreach($reservas as $reserva): ?>
                <tr>
                    <td><?= $reserva['propietario_reserva'] ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>