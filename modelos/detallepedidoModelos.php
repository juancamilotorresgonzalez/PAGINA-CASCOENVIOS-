<?php
include('../controladores/detallepedidoControlador.php');

$obj = new Detallepedido();
if($_POST){
    $obj->codigoPedido = $_POST['codigoPedido'];
    $obj->codigoProducto = $_POST['codigoProducto'];
    $obj->cantidadDetallepedido = $_POST['cantidadDetallepedido'];
    $obj->detallepedido = $_POST['detallepedido'];
    $obj->ivaDetallepedido = $_POST['ivaDetallepedido'];
    $obj->pagaDetallepedido = $_POST['pagaDetallepedido'];
    $obj->valorunitarioDetallepedido = $_POST['valorunitarioDetallepedido'];
    $obj->totalDetallepedido = $_POST['totalDetallepedido'];
}
if(isset($_POST['agregar'])){

    $obj->agregarDetallepedido();

}
if(isset($_POST['modificar'])){

    $obj->modificarDetallepedido();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarDetallepedido();

}
?>