<?php
include('../controladores/documentosControlador.php');

$obj = new Documento();
if($_POST){
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->numeroDocumento = $_POST['numeroDocumento'];
}
if(isset($_POST['agregar'])){

    $obj->agregarDocumento();

}
if(isset($_POST['modificar'])){

    $obj->modificarDocumento();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarDocumento();

}
?>