<!DOCTYPE html>
<html lang="es">
<head>
    
</head>
<body>
<?php
    
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $nombreBD = "eventos";
    $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
    
    if ($conexion->connect_error) {
        die("La conexión ha fallado: " . $conexion->connect_error);
    }
    
    
    $propietario_reserva = '';
    $fecha = '';
    $hora = '';
    $ubicacion = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $propietario_reserva = $_POST['propietario_reserva'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $ubicacion = $_POST['ubicacion'];
        
        
        $query = "SELECT * FROM evento WHERE 1 = 1";
        
        
        if (!empty($nombre)) {
            $query .= " AND propietario_reserva LIKE '%" . $propietario_reserva . "%'";
        }
        if (!empty($fecha)) {
            $query .= " AND fecha = '" . $fecha . "'";
        }
        if (!empty($hora)) {
            $query .= " AND hora = '" . $hora . "'";
        }
        if (!empty($ubicacion)) {
            $query .= " AND ubicacion LIKE '%" . $ubicacion . "%'";
        }
        
        
        $result = $conexion->query($query);
    }
?>

<form id="form2" name="form2" method="POST" action="vistausuario.php.php">
    
    
    <label for="propietario_reserva">Nombre:</label>
    <input type="text" id="propietario_reserva" name="propietario_reserva" value="<?php echo $propietario_reserva; ?>">
    
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
    
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" value="<?php echo $hora; ?>">
    
    <label for="ubicacion">Ubicación:</label>
    <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $ubicacion; ?>">
    
    <input type="submit" value="Buscar">
</form>


<?php if (isset($result)) { ?>
    <div class="table-responsive">
        <table class="table">
            
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ubicación</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['propietario_reserva']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['hora']; ?></td>
                        <td><?php echo $row['ubicacion']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>

</body>
</html>
