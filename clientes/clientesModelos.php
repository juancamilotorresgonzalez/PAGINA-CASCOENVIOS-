<?php
include('../controladores/clienteControlador.php');

$obj = new Cliente();
if($_POST){
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->correoCliente = $_POST['correoCliente'];
    $obj->contrasenaCliente = $_POST['contraseñaCliente'];
    $obj->ciudadCliente = $_POST['ciudadCliente'];
}
if(isset($_POST['agregar'])){

    $obj->agregarCliente();

}
if(isset($_POST['modifica'])){

    $obj->modificarCliente();

}
if(isset($_POST['elimina'])){

    $obj->eliminarCliente();

}
?>