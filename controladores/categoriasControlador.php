<?php
    class Categorias{
                    public $nombreCategorias;


                    function agregar(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from clientes where documentoCliente = '$this->documentoCliente'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cliente ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into clientes values('$this->documentoCliente',;
                                                                        '$this->nombreCategorias')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Cliente Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificar(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from clientes where documentoCliente = '$this->documentoCliente'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Cliente ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into clientes values('$this->documentoCliente',
                                                                        '$this->codigoDocumento',
                                                                        '$this->nombreCliente',
                                                                        '$this->apellidoCliente',
                                                                        '$this->telefonoCliente',
                                                                        '$this->contraseñacliente',
                                                                        '$this->ciudadcliente',
                                                                        '$this->correoCliente')";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Cliente Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminar(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
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