<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/gestion/assets/css/estilo.css">
    <title>Inicio</title>
</head>

<body>

    <?php
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $bd = "eventos";
        $conexion = new mysqli($servidor, $usuario, $password, $bd);
        if ($conexion->connect_error){
            die("la conexion ha fallado: " . $conexion->connect_error);
        }

        if (!isset($_POST['browser'])){$_POST['browser'] = '';}
        if (!isset($_POST['buscaevento'])){$_POST['buscaevento'] = '';}
        if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
        if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
        if (!isset($_POST['buscaubicacion'])){$_POST['buscaubicacion'] = '';}




    ?>
    <header id="header">
        <div>
            <p id="logo"><b id="cacho">Cachorrao</b> <b id="eventos">Eventos</b></p>
        </div>
        <nav>
            <a href="admin.php">Modo Plebeyo</a>
            <a href="">Logout</a>
        </nav>
    </header>

    <main>
        <aside>
            <h2 id="titulo">Filtro de busqueda</h2>
            <form action="" id="form">
                <div id="navbar">
                    <label>Nombre:</label>
                    <input type="text" id="browser" name="browser" value="<?php echo $_POST["browser"] ?>" >
                </div>

                <div>
                    <table id="table_left">
                        <thead>
                            <tr>
                                <th>
                                    <p>Evento:</p>
                                    <select name="buscaevento" id="buscaevento" class="input">
                                        <?php if ($_POST["buscaevento"] != ''){ ?>
                                        <option value="<?php echo $_POST["buscaevento"]; ?>">"<? echo $_POST["buscaevento"]; ?></option>
                                        <?php } ?>
                                        <option value="">Todos</option>
                                        <option value="cumpleaños">Cumpleaños</option>
                                        <option value="concierto">Concierto</option>
                                        <option value="casamiento">Casamiento</option>
                                        <option value="reunion">Reunión</option>
                                        <option value="cena">Cenas</option>
                                    </select>
                                </th>
                                <th>
                                    <p>Fecha desde:</p>
                                    <input type="date" class="input" id="buscafechadesde" name="buscafechadesde" value="<?php echo $_POST["buscafechadesde"]; ?>">
                                </th>
                                <th>
                                    <p>Fecha hasta:</p>
                                    <input type="date" class="input" id="buscafechahasta" name="buscafechahasta" value="<?php echo $_POST["buscafechahasta"]; ?>">>
                                </th>
                                <th>
                                    <p>Ubicación:</p>
                                    <select name="ubicacion" id="ubicacion" class="input">
                                        <?php if ($_POST["buscaubicacion"] != ''){ ?>
                                        <option value="<?php echo $_POST["buscaubicacion"]; ?>">"<? echo $_POST["buscaubicacion"]; ?></option>
                                        <?php } ?>
                                        <option value="">Av. Solis</option>
                                        <option value="">Av. Belgrano</option>
                                        <option value="">Av. Colón</option>
                                        <option value="">Libertad</option>
                                        <option value="">Av.Lugones</option>
                                    </select>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div id="div_button">
                    <input type="submit" value="Ver" id="button">
                </div>
            </form>
        </aside>

        <?php //filtro de busqueda//
            if (($_POST['browser'] == '')($_POST['browser'] = '')){
            $aKeyword = explode("", $_POST['browser']);
            }

            if ($_POST["browser"] == '' AND $_POST["buscaevento"] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == '' AND $_POST['buscaubicacion'] == ''){
                $query ="SELECT * FROM evento ";
            }else{
                    $query ="SELECT * FROM evento ";
                    
                    if($_POST["browser"] != '' ){
                        $query .= "WHERE (nombre LIKE LOWER('%".$aKeyword[0]."%') OR apellidos LIKE LOWER('%".$aKeyword[0]."%')) ";
                    }
                    for($i = 1; $i < count($aKeyword); $i++){
                        if(!empty($aKeyword[$i])) {
                            $query .= " OR nombre LIKE '%" . $aKeyword[$i] . "%' OR apellidos LIKE '%" . $aKeyword[$i] . "%' ";
                        }
                    }
                
                }

                if($_POST["buscaevento"] != '' ){
                    $query .= " AND evento = '".$_POST['buscaevento']."' ";
                }

                if($_POST["buscafechadesde"] != '' ){
                    $query .= " AND fecha BETWEEN '".$_POST['buscafechadesde']."' AND '".$_POST['buscafechahasta']."' ";
                }
                
                if($_POST["buscaubicacion"] != '' ){
                    $query .= " AND ubicacion = '".$_POST['buscaubicacion']."' ";
                }

                $sql = $conexion->query($query);
        ?>      


        <div class="right">
            <h3 id="h3_right">¡Eventos!</h3>
            <table id="table_right">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Ubicación</th>
                        <th>Capacidad Máxima</th>
                    </tr>
                </thead>
                <tbody>

                    <?php While($rowSql = $sql->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $rowSql["nombre"]; ?></td>
                            <td><?php echo $rowSql["fecha"]; ?></td>
                            <td><?php echo $rowSql["hora"]; ?></td>
                            <td><?php echo $rowSql["ubicacion"]; ?></td>
                            <td><?php echo $rowSql["capacidad"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>Copyright - Para los que saben.</p>
        <ul>
            <li><a href="https://www.instagram.com">Instagram</a></li>
            <li><a href="https://www.facebook.com/">Facebook</a></li>
            <li><a href="ejemplo@gmail.com">Contacto</a></li>
        </ul>
    </footer>
</body>
</html>