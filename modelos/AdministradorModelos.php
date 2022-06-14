<?php
include('../controladores/administradorControlador.php');

$obj = new Administrador();
if($_POST){
    $obj->codigoUsuario = $_POST['codigoUsuario'];
    $obj->contraseñaUsuario = $_POST['contraseñaUsuario'];
    $obj->informacionUsuario = $_POST['informacionUsuario'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->codigoAdministrador = $_POST['codigoAdministrador'];
}
if(isset($_POST['agregar'])){

    $obj->agregarAdministrador();

}
if(isset($_POST['modificar'])){

    $obj->modificarAdministrador();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarAdministrador();

}
?>