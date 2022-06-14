<?php
    class Proveedores{
                    public $codigoProveedores;
                    public $nombreProveedores;
                    public $apellidoProveedores;
                    public $direccionProveedores;
                    public $telefonoProveedores;
                    public $ciudadProveedores;
                    public $correoProveedores;
                    public $contraseñaProveedores;



                    function agregarProveedores(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from proveedores where codigoProveedores = '$this->codigoProveedores'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Proveedor ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into proveedores values('$this->codigoProveedores',
                                                                        '$this->nombreProveedores',
                                                                        '$this->direccionProveedores',
                                                                        '$this->telefonoProveedores',  '$this->apellidoProveedores','$this->ciudadProveedores',
                                                                        '$this->correoProveedores',
                                                                        '$this->contraseñaProveedores'                                                                  
                                                                        )";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Proveedor Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarProveedores(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from proveedores where codigoProveedores = '$this->codigoProveedores'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Proveedor ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update proveedores set codigoProveedores = '$this->codigoProveedores',
                                                                    nombreProveedores = '$this->nombreProveedores',
                                                                    direccionProveedores = '$this->direccionProveedores',
                                                                    telefonoProveedores = '$this->telefonoProveedores', 
                                                                    apellidoProveedores =
                                                                    '$this->apellidoProveedores',
                                                                    ciudadProveedores =
                                                                    '$this->ciudadProveedores',
                                                                    correoProveedores =
                                                                    '$this->correoProveedores',
                                                                    contraseñaProveedores =
                                                                    '$this->contraseñaProveedores',                                              
                                                                     where codigoProveedores = '$this->codigoProveedores'";








                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Proveedor Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarProveedores(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from proveedores where codigoProveedores = '$this->codigoProveedores'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Proveedor Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Proveedor No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>