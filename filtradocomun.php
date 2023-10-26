<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
    $tipo_evento = '';
    $ubicacion = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $propietario_reserva = $_POST['propietario_reserva'];
        $fecha = $_POST['fecha'];
        $tipo_evento = $_POST['tipo_evento'];
        $ubicacion = $_POST['ubicacion'];
        
        
        $query = "SELECT * FROM evento WHERE 1 = 1";
        
        
        if (!empty($nombre)) {
            $query .= " AND propietario_reserva LIKE '%" . $propietario_reserva . "%'";
        }
        if (!empty($fecha)) {
            $query .= " AND fecha = '" . $fecha . "'";
        }
        if (!empty($tipo_evento)) {
            $query .= " AND tipo_evento = '" . $tipo_evento . "'";
        }
        if (!empty($ubicacion)) {
            $query .= " AND ubicacion LIKE '%" . $ubicacion . "%'";
        }
        
        
        $result = $conexion->query($query);
    }
?>
<a href="index.php">Volver a Inicio</a>
<br><br><br>
<form id="form2" name="form2" method="POST" action="filtradocomun.php">
    
    
    <label for="propietario_reserva">Nombre:</label>
    <input type="text" id="propietario_reserva" name="propietario_reserva" value="<?php echo $propietario_reserva; ?>">
    
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
    
    <label for="tipo_evento">Tipo</label>
    <select name="tipo_evento" id="tipo_evento">
        <option value="">Elija una opción</option>
        <option value="casamiento">Casamiento</option>
        <option value="cumpleaños">Cumpleaños</option>
        <option value="comunion">Comunión</option>
    </select>
    
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
                    <th>Tipo</th>
                    <th>Ubicación</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['propietario_reserva']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['tipo_evento']; ?></td>
                        <td><?php echo $row['ubicacion']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>
