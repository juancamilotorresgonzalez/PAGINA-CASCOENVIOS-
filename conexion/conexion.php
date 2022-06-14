<?php

class Conexion{
                private $servidor = "localhost";
                private $usuario ="root";
                private $contraseña = "";
                private $BD = "pedidos";

    
                 function conectar_al_servidor(){	
        
                                    $con = mysqli_connect($this->servidor, $this->usuario, $this->contraseña, $this->BD)or die ("Error de conexion por favor comunicarse con el administrador"); 
                                    return $con;
                                    } 


}

$obj = new Conexion();
if($obj->conectar_al_servidor()){
    echo "conectado";
    }

?>