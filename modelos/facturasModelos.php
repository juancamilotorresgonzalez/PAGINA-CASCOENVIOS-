<?php
include('../controladores/facturasControlador.php');

$obj = new  Facturas();
if($_POST){
    $obj->numeroFactura = $_POST['numeroFactura'];
    $obj->codigoPedido = $_POST['codigoPedido'];
    $obj->fechaFactura = $_POST['fechaFactura'];
    $obj->ivaFactura = $_POST['	ivaFactura'];
    $obj->horaFactura = $_POST['horaFactura'];
    $obj->valorUnitarioFactura = $_POST['valorUnitarioFactura'];
    $obj->totalFactura = $_POST['totalFactura'];
}
if(isset($_POST['agregar'])){

    $obj->agregarFactura();

}
if(isset($_POST['modificar'])){

    $obj->modificarFactura();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarFactura();

}
?>