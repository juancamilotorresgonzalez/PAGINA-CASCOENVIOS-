<?php
include('../simpletest/autorun.php');
class pedidos{
                public $codigoPedido;
                public $fechaPedido;
                public $horaPedido;
                public $documentoCliente;

                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectar_al_servidor();
                                    $sql = "select * from pedidos where documentoCliente = '$this->documentoCliente'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if($arreglo = mysqli_fetch_row($resultado)){

                                        echo"<script> alert('El pedido ya Existe en el Sistema');</script>";

                                    }else{
                                        $insertar ="insert into carreteras values('$this->documentoCliente','$this->codigoPedido','$this->fechaPedido','$this->horaPedido)";
                                        echo $insertar;
                                        mysqli_query($cone,$insertar);
                                        echo"<script> alert('El pedido fue creado  en el Sistema');</script>";

                                    }


                }
                function modificar(){
                                    $c = new Conexion();
                                    $cone = $c->conectar_al_servidor();
                                    $sql = "select * from pedidos where documentoCliente = '$this->documentoCliente'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if(!mysqli_fetch_row($resultado)){

                                        echo"<script> alert('El pedido ya Existe en el Sistema');</script>";

                                    }else{
                                        $update ="update pedidos set codigoPedido ='$this->codigoPedido',
                                                                        fechaPedido = '$this->fechaPedido',
                                                                        idcategorias = '$this->idcategorias'
                                                                        horaPedido = '$this->horaPedido',
                                                                        documentoCliente ='$this->documentoCliente';
                                                                        where codigoPedido ='$this->codigoPedido';
                                                                         ";
                                        echo $update;
                                        mysqli_query($cone,$update);
                                        echo"<script> alert('El pedido fue Modificado en el Sistema');</script>";

                                    }



                }
                function eliminar(){
                            $c = new Conexion();
                            $cone = $c->conectar_al_servidor();
                            $delete = "delete from pedidos where codigoPedido ='$this->codigoPedido'; ";
                            if(mysqli_query($cone,$delete)){
                                    echo"<script> alert('El pedido fue eliminado del Sistema');</script>";
                            }else{
                                echo"<script> alert('El pedido no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
                            }       
                }

}





?>