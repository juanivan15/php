<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

$usuario = "";
$email = "";
$contraseña = "";
$direccion = "";
$telefono = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];



    try{
        $stmt = $conn->prepare("
            INSERT INTO usuarios SET 
                usuario = '$usuario',
                email = '$email',
                contraseña = '$contraseña',
                direccion = '$direccion',
                telefono = '$telefono'
            ");

        $stmt->execute();

        header('Location: ../tablas/tablausuarios.php');
    } catch (PDOException $e){
        echo $e ;
    }



}

?>
<link rel="stylesheet" href="style.css">
<title>Agregar nuevo usuario</title>
<body>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
<div>
    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" value="<?= $usuario ?>" required>
</div>
<div>
    <label for="contraseña">Contraseña</label>
    <input type="password" name="contraseña" value="<?= $contraseña ?>" required>
</div>
<div>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $email ?>" required>
</div>
<div>
    <label for="telefono">Telefono</label>
    <input type="text" name="telefono" value="<?= $telefono ?>" required>
</div>
<div>
    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" value="<?= $direccion ?>" required>
</div>
<button type="submit" class="envio">Guardar</button>
</form>
</body>