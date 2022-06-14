<?php
include('../controladores/usuariosControlador.php');

$obj = new Usuarios();
if($_POST){
    $obj->codigoUsuario = $_POST['codigoUsuario'];
    $obj->contraseñaUsuario = $_POST['contraseñaUsuario'];
    $obj->informacionUsuario = $_POST['informacionUsuario'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->codigoAdministrador = $_POST['codigoAdministrador'];
}
if(isset($_POST['agregar'])){

    $obj->agregarUsuarios();

}
if(isset($_POST['modificar'])){

    $obj->modificarUsuarios();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarUsuarios();

}
?>