<?php
$host = "localhost";
$User = "root";
$bd = "eventos";
$pass = "";

$conexion = mysqli_connect($host, $User, $pass, $bd);

if (!$conexion){
    echo "conexion fallida";

}
