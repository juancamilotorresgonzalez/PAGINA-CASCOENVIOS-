<?php
    class Detallepedido{
                    public $codigoPedido;
                    public $codigoProducto;
                    public $cantidadDetallepedido;
                    public $detallepedido;
                    public $ivaDetallepedido;
                    public $pagaDetallepedido;
                    public $valorunitarioDetallepedido	;
                    public $totalDetallepedido;

                    function agregarDetallepedido(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from detallepedido where 	codigoPedido = '$this->codigoPedido'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Detallepedido ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into detallepedido values('$this->codigoPedido',
                                                                        '$this->codigoProducto',
                                                                        '$this->cantidadDetallepedido',
                                                                        '$this->detallepedido',
                                                                        '$this->ivaDetallepedido',
                                                                        '$this->pagaDetallepedido',
                                                                        '$this->valorunitarioDetallepedido',
                                                                        '$this->totalDetallepedido')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Detallepedido Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarDetallepedido(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from detallepedido where 	codigoPedido = '$this->codigoPedido'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Detallepedido ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into detallepedido values('$this->codigoPedido',
                                                                            '$this->codigoProducto',
                                                                            '$this->cantidadDetallepedido',
                                                                            '$this->detallepedido',
                                                                            '$this->ivaDetallepedido',
                                                                            '$this->pagaDetallepedido',
                                                                            '$this->valorunitarioDetallepedido',
                                                                            '$this->totalDetallepedido')";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Detallepedido Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarDetallepedido(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from detallepedido where 	codigoPedido= '$this->codigoPedido'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Detallepedido Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Detallepedido No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>