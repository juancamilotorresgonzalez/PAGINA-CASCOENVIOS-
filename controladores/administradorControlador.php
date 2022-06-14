<?php
    class Administrador{
                    public $codigoAdministrador;
                    public $contraseñaAdministrador;


                    function agregarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from administrador where codigoAdministrador  = '$this->codigoAdministrador '";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Administrador ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into administrador values('$this->codigoAdministrador',
                                                                        '$this->contraseñaAdministrador'                                                                        
                                                                        )";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Administrador Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from administrador where codigoAdministrador  = '$this->codigoAdministrador '";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Administrador ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into administrador values('$this->codigoAdministrador',
                                                                        '$this->contraseñaAdministrador',                                                                       
                            )";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Administrador Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from administrador where codigoAdministrador  = '$this->codigoAdministrador '";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Administrador Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Administrador No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>