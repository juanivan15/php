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
<title>Editar información del usuario</title>
<link rel="stylesheet" href="style.css">
<body>
<form action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $id ?>" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
<div>
    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" value="<?= $usuario ?>" required>
</div>
<div>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $email ?>" required>
</div>
<div>
    <label for="contraseña">Contraseña</label>
    <input type="password" name="contraseña" value="<?= $contraseña ?>" required>
</div>
<div>
    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" value="<?= $direccion ?>" required>
</div>
<div>
    <label for="telefono">Telefono</label>
    <input type="text" name="telefono" value="<?= $telefono ?>" required>
</div>
<button type="submit" class="envio">Guardar</button>
</form>

</body>