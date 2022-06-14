<?php
    class Facturas{
                    public $numeroFactura;
                    public $codigoPedido ;
                    public $fechaFactura;
                    public $ivaFactura;
                    public $horaFactura;
                    public $valorUnitarioFactura;
                    public $totalFactura; 

                    function agregarFactura(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from factura where numeroFactura = '$this->numeroFactura'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('La Factura ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into factura values('$this->numeroFactura',
                                                                        '$this->codigoPedido ',
                                                                        '$this->fechaFactura',
                                                                        '$this->ivaFactura',
                                                                        '$this->horaFactura',
                                                                        '$this->valorUnitarioFactura',
                                                                        '$this->totalFactura')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('La Factura Fue registrada en el Sistema')</script>";
                        }


                    }

                    function modificarFactura(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from factura where numeroFactura = '$this->numeroFactura'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('La Factura ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into factura values('$this->numeroFactura',
                                                                        '$this->codigoPedido ',
                                                                        '$this->fechaFactura',
                                                                        '$this->ivaFactura',
                                                                        '$this->horaFactura',
                                                                        '$this->valorUnitarioFactura',
                                                                        '$this->totalFactura')";
                            echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('La Factura Fue Modificada en el Sistema')</script>";
                        }
  

                    }

                    function eliminarFactura(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from factura where numeroFactura = '$this->numeroFactura'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('La FacturaFue Eliminada en el Sistema')</script>";
                        }else{
                            echo "<script> alert('La Factura No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>