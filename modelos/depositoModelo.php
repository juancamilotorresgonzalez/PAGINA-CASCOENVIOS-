<?php
include('../controladores/depositoControlador.php');

$obj = new Deposito();
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

    $obj->agregarDeposito();

}
if(isset($_POST['modificar'])){

    $obj->modificarDeposito();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarDeposito();

}
?>