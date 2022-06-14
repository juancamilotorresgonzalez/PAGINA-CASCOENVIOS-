<?php
include('../controladores/clienteControlador.php');

$obj = new Cliente();
if($_POST){
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->contraseñacliente = $_POST['contraseñacliente'];
    $obj->ciudadcliente = $_POST['ciudadcliente'];
    $obj->correoCliente = $_POST['correoCliente'];
}
if(isset($_POST['agregar'])){

    $obj->agregarCliente();

}
if(isset($_POST['modificar'])){

    $obj->modificarCliente();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarCliente();

}
?>