<?php
    class Usuarios{
                    public $codigoUsuario;
                    public $contraseñaUsuario;
                    public $informacionUsuario;
                    public $codigoDocumento;
                    public $codigoAdministrador;

                    function agregarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from usuario where codigoUsuario = '$this->codigoUsuario'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Usuario ya existe en el Sistema')</script>";
                        }else{
                                $insertar = "insert into usuario values('$this->codigoUsuario',
                                                                        '$this->contraseñaUsuario',
                                                                        '$this->informacionUsuario',
                                                                        '$this->codigoDocumento',
                                                                        '$this->codigoAdministrador'                                                                        
                                                                        )";
                                echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Usuario Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from usuario where codigoUsuario = '$this->codigoUsuario'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(!mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Usuario ya existe en el Sistema')</script>";
                        }else{
                            $modificar = "insert into usuario values('$this->codigoUsuario',
                                                                        '$this->contraseñaUsuario',
                                                                        '$this->informacionUsuario',
                                                                        '$this->codigoDocumento',
                                                                        '$this->codigoAdministrador'                                                                        
                            )";
                                echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Usuario Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarUsuarios(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from usuario where codigoUsuario = '$this->codigoUsuario'";
                        echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Usuario Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Usuario No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>