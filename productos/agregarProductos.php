<?php 
    include('../conexion/conexion.php');
    include('../modelos/productosModelos.php');
?>
<?php
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
?>
<?php

        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from proveedores";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_assoc($resultado);
        echo $arreglo [0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <center>
    <form action="" name="producto" id="producto" method="POST">
        <h2>Crear Producto</h2>
        <table border="1">
            <tr>
                <td>Codigo</td>
                <td><input type="text" name="codigoProducto" id="codigoProducto" placeholder="Codigo Asigando Por el Sistema"  size="30"></td>
                      
                <td>Nombre</td>
                <td><input type="text" name="nombreProducto" id="nombreProducto" placeholder="Digite el Nombre del Producto"  size="45"></td>
            </tr>
            <tr>
                <td>Entrada</td>
                <td><input type="text" name="entradaProducto" id="entradaProducto"  placeholder=""  size="45"></td>
                <td>Salida</td>
                <td><input type="text" name="salidaProducto" id="salidaProducto"  placeholder=""  size="45"></td>
            </tr>
            <tr>
                <td>Existencias</td>
                <td><input type="text" name="existenciasProducto" id="existenciasProducto" placeholder=""  size="45"></td>
                <td>Valor </td>
                <td><input type="text" name="valorProducto" id="valorProducto" placeholder="Digite el Valor del Producto"  size="45"></td>
            </tr>
            <tr>
            <td>Seleccione el Proveedor</td>
                <td colspan="3">
                    <select name="codigoProveedores" id="codigoProveedores">
                        <option>
                            Seleccione el Proveedor
                        
                                <?php
                                    do{
                                       $identidad = $arreglo['codigoProveedores'];
                                       $nombre =    $arreglo['nombreProveedores']; 
                                       if($identidad == $obj->codigoProveedores){
                                           echo "<option value=$identidad=>$nombre";
                                       }else{
                                            echo "<option value=$identidad>$nombre";
                                           }                                      
                                    }while($arreglo = mysqli_fetch_assoc($resultado));
                                    $row = mysqli_num_rows($resultado);
                                    $rows=0;
                                    if($rows>0){
                                                mysqli_data_seek($arreglo[0]);
                                                $arreglo = mysqli_fetch_assoc($resultado);
                                    }
                                ?> 
                        </option>
                    </select>
                
                </td>
            
            </tr>
            
            <tr>
                <td colspan="4">
                    <center>
                        <button name="agregar" type="submit"> Guardar</button>
                        <a href="Productos.php">
                            <button name="salir" type="button">Salir</button>
                        </a>
                    </center>
                </td>
            </tr>

        </table>
        

    </form>
    </center>    
    
</body>
</html>