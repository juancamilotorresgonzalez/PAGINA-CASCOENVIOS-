<?php
    class Documento{
                    public $codigoDocumento;
                    public $numeroDocumento;

                    function agregarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from documentos where numeroDocumento = '$this->numeroDocumento'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Documento ya existe en el Sistema')</script>";
                        }else{
                               $insertar = "insert into documentos values('$this->codigoDocumento','$this->numeroDocumento')";
                               // echo $insertar;
                                mysqli_query($conecta,$insertar);
                                echo "<script> alert('El Documento Fue registrado en el Sistema')</script>";
                        }


                    }

                    function modificarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $consulta = "select * from documentos where numeroDocumento = '$this->numeroDocumento'";
                        $resultado = mysqli_query($conecta, $consulta);
                        if(mysqli_fetch_array($resultado)){
                            echo "<script> alert('El Documento ya existe en el Sistema')</script>";
                        }else{
                                $modificar = "update documentos set codigoDocumento = '$this->codigoDocumento',
                                numeroDocumento = '$this->numeroDocumento'
                                where codigoDocumento = '$this->codigoDocumento'";
                                //echo $modificar;
                                mysqli_query($conecta,$modificar);                                    
                                echo "<script> alert('El Documento Fue Modificado en el Sistema')</script>";
                        }
  

                    }

                    function eliminarDocumento(){
                        $clas = new Conexion();
                        $conecta = $clas->conectar_al_servidor();
                        $eliminar="delete from documentos where codigoDocumento = '$this->codigoDocumento'";
                        //echo $eliminar;
                        if(mysqli_query($conecta,$eliminar)){
                            echo "<script> alert('El Documento Fue Eliminado en el Sistema')</script>";
                        }else{
                            echo "<script> alert('El Documento No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                        }


                    }
   }   
?>