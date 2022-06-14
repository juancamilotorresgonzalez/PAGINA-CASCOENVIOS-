<?php
    class Cliente{
                    public $documentoCliente;
                    public $codigoDocumento;
                    public $nombreCliente;
                    public $apellidoCliente;
                    public $telefonoCliente;
                    public $correoCliente;
                    public $ciudadCliente;
                    public $contrasenaCliente;

                    function agregarCliente(){
                        $clas = new Conexion();
                        $conecta = $clas->conectarServidor();
                        $consulta = "select * from clientes where documentoCliente = '$this->documentoCliente'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cliente ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into clientes values('$this->documentoCliente',
                                                                         '$this->codigoDocumento',
                                                                         '$this->nombreCliente',
                                                                         '$this->apellidoCliente',
                                                                         '$this->telefonoCliente','$this->contrasenaCliente','$this->ciudadCliente',


                                                                         '$this->correoCliente')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Cliente Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarCliente(){
                        $clas = new Conexion();
                        $conecta = $clas->conectarServidor();
                        $consulta = "select * from clientes where documentoCliente = '$this->documentoCliente'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cliente ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update clientes set documentoCliente =      '$this->documentoCliente',
                                                                        codigoDocumento =    '$this->codigoDocumento',
                                                                        nombreCliente =      '$this->nombreCliente',
                                                                        apellidoCliente =    '$this->apellidoCliente',
                                                                        telefonoCliente =    '$this->telefonoCliente',
                                                                        correoCliente =      '$this->correoCliente',
                                                                        ciudadCliente =
                                                                        '$this->ciudadCliente',
                                                                        contraseñaCliente =
                                                                        '$this->contrasenaCliente'




                                                                    where documentoCliente = '$this->documentoCliente'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Cliente Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarCliente(){
                        $clas = new Conexion();
                        $conecta = $clas->conectarServidor();
                        $eliminar="delete from clientes where documentoCliente = '$this->documentoCliente'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Cliente Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Cliente No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>