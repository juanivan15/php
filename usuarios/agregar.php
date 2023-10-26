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

        header('Location: ../index.php');
    } catch (PDOException $e){
        echo $e ;
    }



}

?>
<head>
    <title>Agregar nuevo usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Agregar nuevo usuario</h1>
    <br>
    <a href="../login/sesionusuario.php">Volver a Inicio</a>
    <br><br><br>
<form class="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
<div class="col-6">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" name="usuario" value="<?= $usuario ?>" required>
</div>
<div class="col-6">
    <label for="contraseña">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" value="<?= $contraseña ?>" required>
</div>
<div class="col-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
</div>
<div class="col-6">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="<?= $telefono ?>" required>
</div>
<div class="col-6">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="<?= $direccion ?>" required>
</div>
<button type="submit" class="btn btn-primary form-control">Guardar</button>
<br>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>