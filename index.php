<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Mejor Evento</title>
    <link rel="shortcut icon" href="img/evenjohn.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/evenjohn.png" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fuentes">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="filtradocomun.php">Filtro de búsqueda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/Index.php">Iniciar Sesión</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="usuarios/agregar.php">Registrarse</a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </header>
    <div class="caja">
        <h1>BIENVENIDO A EVENJOHN</h1>
        <div>
            <p> Tu Solución Integral para la Gestión de Eventos

                       ¿Qué es EVENJOHN?

                Es la plataforma definitiva para gestionar tus eventos de manera sencilla y exitosa. 
                Con EVENJOHN, puedes: 
                <ul>
                    <li>Iniciar sesion</li>
                    <li>Registrarte como un nuevo usuario</li>
                    <li>Configurar fechas para tu evento</li>
                    <li>Contactar con asistentes</li>
                    <li>Acceder a la lista de eventos disponibles</li>
                </ul>
                <h3>¿Por qué elegir EVENJOHN?</h3> 
                <ul>
                    <li>Facilidad de uso </li>
                    <li>Seguridad </li>
                    <li>Soporte 24/7 </li>
                    <li>Mejores precios </li>
                </ul>

                <h4>¿Listo para comenzar?</h4>
            </p>
        </div>
        <p class="msj">Contratanos y nosotros te hacemos vivir la mejor fiesta de tu vida!</p>
    </div>

    <div class="bodys">
    <div class="tituloProductos mt-1">
        <h2>TIPOS DE EVENTOS QUE OFRECEMOS</h2>
        <br>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 col-sm-12 centered-div">
            <div class="card text-center" style="width: 18rem;">
                <img src="img/cumpleaños.avif" class="card-img-top" alt="Cumpleaños">
                <div class="card-body">
                    <h2 class="card-title">Cumpleaños</h2>
                    <p class="card-text">Mirá las distinta opciones que tenemos para vos</p>
                    <a href="eventos/agregarcomun.php" class="btn colorBtn">Reservar</a>
                </div>
            </div>
        </div>    
        <div class="col-xl-4 col-md-6 col-sm-12 centered-div">
            <div class="card text-center" style="width: 18rem;">
                <img src="img/casamiento.jpeg" class="card-img-top" alt="Casamiento">
                <div class="card-body">
                    <h2 class="card-title">Casamiento</h2>
                    <p class="card-text">Mirá las distinta opciones que tenemos para vos</p>
                    <a href="eventos/agregarcomun.php" class="btn colorBtn">Reservar</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12 centered-div">
            <div class="card text-center" style="width: 18rem;">
                <img src="img/comunion.jpg" class="card-img-top" alt="Comunión">
                <div class="card-body">
                    <h2 class="card-title">Comunión</h2>
                    <p class="card-text">Mirá las distinta opciones que tenemos para vos</p>
                    <a href="eventos/agregarcomun.php" class="btn colorBtn">Reservar</a>
                </div>
            </div>
        </div>
    </div>    



    <footer>
        <ul>
            <li class="navegacion"><a href="https://www.instagram.com/" target="_blank"><img src="img/instagram.png"
                        alt="logo de instagram" class=""></a></li>
            <li class="navegacion"><a href="https://facebook.com" target="_blank"><img src="img/facebook.png"
                        alt="Logo de facebook" class=""></a></li>
            <li class="navegacion"><a href="https://web.whatsapp" target="_blank"><img src="img/whatsapp.png"
                        alt="logo de telefono" class=""></a></li>
        </ul>
        <p>Copyright © 2023 EVENJOHN.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>
