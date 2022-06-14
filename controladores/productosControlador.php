<?php
    class Productos{
                    public $codigoProducto;
                    public $nombreProducto;
                    public $entradaProducto;
                    public $salidaProducto;
                    public $existenciasProducto;
                    public $valorProducto;
                    public $codigoProveedores; 

                    function agregarProductos(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from productos where codigoProducto = '$this->codigoProducto'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Producto ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into productos values('$this->codigoProducto',
                                                                        '$this->nombreProducto',
                                                                        '$this->entradaProducto',
                                                                        '$this->salidaProducto',
                                                                        '$this->existenciasProducto',
                                                                        '$this->valorProducto',
                                                                        '$this->codigoProveedores')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Producto Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarProductos(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from productos where codigoProducto = '$this->codigoProducto'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Producto ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update productos set codigoProducto = '$this->codigoProducto',
                                                                    nombreProducto = '$this->nombreProducto',
                                                                    entradaProducto = '$this->entradaProducto',
                                                                    salidaProducto = '$this->salidaProducto',
                                                                    existenciasProducto = '$this->existenciasProducto',
                                                                    valorProducto = '$this->valorProducto',
                                                                    codigoProveedores = '$this->codigoProveedores'
                                                                where codigoProducto = '$this->codigoProducto'";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Producto Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarProductos(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from productos where codigoProducto = '$this->codigoProducto'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Producto Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Producto No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>