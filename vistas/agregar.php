<?php

include 'conexion.php';

if(isset($_POST["guardar datos"])){
    echo "Guardado con Exito";
    $title = $_POST ["title"];
    $descripcion = $_POST ["descripcion"];
    echo $title;
    echo $descripcion;

    $squery = "insert into" 
    }
?>

