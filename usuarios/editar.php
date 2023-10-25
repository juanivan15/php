<?php
include '../conexion/config.php';
include '../conexion/conexion.php';

// if(isset($_GET['id'])){
//     $id = htmlspecialchars($_GET["id"]);
// }
$id = htmlspecialchars($_GET["id"]);

try{
    $stmt = $conn->prepare("
        SELECT id_usuario, usuario, email, contraseña, direccion, telefono 
        FROM usuarios 
        WHERE id_usuario = $id");

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

    $usuarios = $stmt->fetch();

    $usuario = $usuarios["usuario"];
    $email = $usuarios["email"];
    $contraseña = $usuarios["contraseña"];
    $direccion = $usuarios["direccion"];
    $telefono = $usuarios["telefono"];

} catch (PDOException){
    echo "No se pudo conectar con la base de datos.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    extract($_POST);

    try{$stmt = $conn->prepare("
            UPDATE usuarios SET 
                usuario = '$usuario',
                email = '$email',
                contraseña = '$contraseña',
                direccion = '$direccion',
                telefono = '$telefono'
            WHERE id_usuario = $id
        ");

        $stmt->execute();
        header('Location: ../tablas/tablausuarios.php');
    } catch (PDOException $e){
        echo $e ;
    }
}

?>
<head>
<title>Editar información del usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1>Editar información del usuario</h1>
<form class="form" action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
<div class="col-6">
    <label for="usuario">Usuario</label>
    <input type="text"  class="form-control" name="usuario" value="<?= $usuario ?>" required>
</div>
<div class="col-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
</div>
<div class="col-6">
    <label for="contraseña">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" value="<?= $contraseña ?>" required>
</div>
<div class="col-6">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="<?= $direccion ?>" required>
</div>
<div class="col-6">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="<?= $telefono ?>" required>
</div>
<button type="submit" class="form-control btn btn-primary">Guardar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>