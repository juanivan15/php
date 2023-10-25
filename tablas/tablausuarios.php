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
    <title>Examen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Usuarios registrados</h1>
    <table>
        <thead>
            <th>Usuario</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT id_usuario, usuario, email, contraseña, direccion, telefono FROM usuarios");

                $stmt->execute();
            
                $stmt->setFetchMode(PDO::FETCH_ASSOC);   
            
                $usuarios = $stmt->fetchAll();
            ?>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['usuario'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['contraseña'] ?></td>
                    <td><?= $usuario['direccion'] ?></td>
                    <td><?= $usuario['telefono'] ?></td>
                    <td>
                        <button><a href="../usuarios/editar.php?id=<?=$usuario['id_usuario']?>">Editar</a></button>
                        <button><a href="../usuarios/eliminar.php?id=<?=$usuario['id_usuario']?>">Eliminar</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>




        </tbody>
        
    </table>
    <button><a href="../usuarios/agregar.php">Nuevo Usuario</a></button>
</body>
</html>