<?php
include('../controladores/proveedoresControlador.php');

$obj = new Proveedores();
if($_POST){
    $obj->codigoProveedores = $_POST['codigoProveedores'];
    $obj->nombreProveedores = $_POST['nombreProveedores'];
    $obj->apellidoProveedores = $_POST['apellidoProveedores']; 
    $obj->direccionProveedores = $_POST['direccionProveedores'];
    $obj->telefonoProveedores = $_POST['telefonoProveedores'];
    $obj->ciudadProveedores = $_POST['ciudadProveedores'];  
    $obj->correoProveedores = $_POST['correoProveedores'];  
    $obj->contraseñaProveedores = $_POST['contraseñaProveedores']; 
}
if(isset($_POST['agregar'])){

    $obj->agregarProveedores();

}
if(isset($_POST['modificar'])){

    $obj->modificarProveedores();

}
if(isset($_POST['eliminar'])){

    $obj->eliminarProveedores();

}
?>