<?php
session_start();
include 'Conexion.php';

if (isset($_POST['usuario']) && isset($_POST['contraseña'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Usuario = validate($_POST['usuario']);
    $Clave = validate($_POST['contraseña']);

    if (empty($Usuario)){
        header("Location: Index.php?error=El usuario es requerido");
        exit();
    }elseif(empty($Clave)){
        header("Location: Index.php?error=La clave es requerida");
        exit();
    }else{

        $clave = md5($Clave);

        $Sql = "SELECT * FROM usuarios WHERE usuario = '$Usuario' AND contraseña ='$Clave'";
        $result = mysqli_query($conexion, $Sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['usuario'] === $Usuario && $row['contraseña'] === $Clave){
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            }else{
                header("Location: Index.php?error=El usuario o la clave son incorrectas");
                exit();
            }
        }else{
            header("Location: Index.php?error=El usuario o la clave son incorrectas");
                exit();
        }
    }
} else{
    header("Location: ../index.php");
                exit();
}

