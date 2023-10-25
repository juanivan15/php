<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/botstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvkuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inicio de sesion</title>
</head>
<body class="bodylogin">
    <form action="IniciarSesion.php" method="POST">
        <h1>INICIAR SESION</h1>
        <hr>

        <?php 
            if(isset($_GET['error'])){
                ?>
                <p class="error">
                    <?php
                    echo $_GET['error'];
                    ?>
                </p>
                <?php
            }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Nombre de usuario">

        <i class="fa-solid fa-unlock"></i>
        <label>Contraseña</label>
        <input type="text" name="contraseña" placeholder="contraseña">
        <hr>
        <button typw="submit">Iniciar Sesion</button>
        <a href="../usuarios/agregar.php">Crear Cuenta</a>
    </form>


</body>
</html>