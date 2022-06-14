<?php
include('../controladores/productosControlador.php');

$obj = new  Productos();
if($_POST){
    $obj->codigoProducto = $_POST['codigoProducto'];
    $obj->nombreProducto = $_POST['nombreProducto'];
    $obj->entradaProducto = $_POST['entradaProducto'];
    $obj->salidaProducto = $_POST['salidaProducto'];
    $obj->existenciasProducto = $_POST['existenciasProducto'];
    $obj->valorProducto = $_POST['valorProducto'];
    $obj->codigoProveedores = $_POST['codigoProveedores'];
}
if(isset($_POST['agregar'])){

    $obj->agregarProductos();

}
if(isset($_POST['modificar'])){

    $obj->modificarProductos();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarProductos();

}
?>