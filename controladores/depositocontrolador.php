<?php
    class Deposito{
                    public $codigoDeposito;
                    public $numeroFactura ;
                    public $codigoProveedores;
                    public $fechaDeposito;
                    public $horaDeposito;
                    public $valorDeposito;
                    public $ivaDeposito;
                    public $totalDeposito;

                    function agregarDeposito(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from deposito where codigoDeposito = '$this->codigoDeposito'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Deposito ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into deposito values('$this->codigoDeposito',
                                                                        '$this->numeroFactura',
                                                                        '$this->codigoProveedores',
                                                                        '$this->fechaDeposito',
                                                                        '$this->horaDeposito',
                                                                        '$this->valorDeposito',
                                                                        '$this->ivaDeposito',
                                                                        '$this->totalDeposito')";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Deposito Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarDeposito(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from deposito where codigoDeposito = '$this->codigoDeposito'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Deposito ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into deposito values('$this->codigoDeposito',
                                                                        '$this->numeroFactura',
                                                                        '$this->codigoProveedores',
                                                                        '$this->fechaDeposito',
                                                                        '$this->horaDeposito',
                                                                        '$this->valorDeposito',
                                                                        '$this->ivaDeposito',
                                                                        '$this->totalDeposito')";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Deposito Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarDeposito(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from deposito where codigoDeposito = '$this->codigoDeposito'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Deposito Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Deposito No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>