<?php

 class conexion{
                private $servidor = "localhost";
                private $usuario = "root";
                private $clave = "";
                private $baseDatos = "pedidos";

                function conectarServidor(){

                    $con = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->baseDatos) or die ("Error con la conexion al servidor ");
                    return $con;


                }

 }   

 $obj = new Conexion();
 if($obj->conectarServidor()){
     echo "conectado";
 }
?>