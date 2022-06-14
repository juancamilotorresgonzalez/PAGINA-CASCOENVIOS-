<?php
include("../controladores/pedidoscontrolador.php");

$obj = new pedidos();
if($_POST){
    $obj->codigoPedido = $_POST['codigoPedido'];
    $obj->fechaPedido = $_POST['fechaPedido'];
    $obj->horaPedido = $_POST['horaPedido'];
    $obj->documentoCliente = $_POST['documentoCliente'];
    
    if(isset($_POST['guardar'])){
            $obj->agregar();
    }

    if(isset($_POST['modificar'])){
        $obj->modificar();
    }

    if(isset($_POST['eliminar'])){
        $obj->eliminar();
    }

}



?>