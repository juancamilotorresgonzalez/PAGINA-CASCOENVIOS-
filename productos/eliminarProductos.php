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
$llave = $_GET['key'];
echo $llave;
if(isset($_POST['eliminar'])){

        $obj->codigoProducto = "";
        $obj->nombreProducto = "";
        $obj->entradaProducto = "";
        $obj->salidaProducto = "";
        $obj->existenciasProducto = "";
        $obj->valorProducto = "";
        $obj->codigoProveedores = "";

}else{

    $clas = new Conexion();
    $conecta = $clas->conectar_al_servidor();
    $query = "select * from productos where codigoProducto = '$llave'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->codigoProducto = $arreglo[0];
    $obj->nombreProducto = $arreglo[1];
    $obj->entradaProducto = $arreglo[2];
    $obj->salidaProducto = $arreglo[3];
    $obj->existenciasProducto = $arreglo[4];
    $obj->valorProducto = $arreglo[5];
    $obj->codigoProveedores = $arreglo[6];

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <h2>Eliminar Productos</h2>
        <table border="1">
            <tr>
                <td>Codigo</td>
                <td><input type="text" name="codigoProducto" id="codigoProducto" value="<?php echo $obj->codigoProducto  ?>" placeholder="Digite el Codigo del Producto"  size="30"></td>
                <td>Nombre</td>
                <td><input type="text" name="nombreProducto" id="nombreProducto" value="<?php echo $obj->nombreProducto  ?>" placeholder="Digite el Nombre del Producto"  size="45"></td>
            </tr>
            <tr>
                <td>Entrada</td>
                <td><input type="text" name="entradaProducto" id="entradaProducto" value="<?php echo $obj->entradaProducto ?>"  readOnly placeholder=""  size="45"></td>
                <td>Salida</td>
                <td><input type="text" name="salidaProducto" id="salidaProducto" value="<?php echo $obj->salidaProducto  ?>"  readOnlyplaceholder=""  size="45"></td>
            </tr>
            <tr>
                <td>Existencias</td>
                <td><input type="text" name="existenciasProducto" id="existenciasProducto" value="<?php echo $obj->existenciasProducto  ?>"  placeholder="Digite el Correo del Cliente"  size="45"></td>
                <td>Valor</td>
               <td><input type="text" name="valorProducto" id="valorProducto" value="<?php echo $obj->valorProducto  ?>" placeholder="Digite el Correo del Cliente"  size="45"></td>
            </tr>
            <tr>
            <td>Proveedores</td>
            <td>
            <input type="text" name="codigoProveedores" id="codigoProveedores" value="<?php 
            $clas = new Conexion();
            $conecta = $clas->conectar_al_servidor();
            $query1 = "SELECT nombreProveedores from proveedores where codigoProveedores ='$obj->codigoProveedores'";
            $res=mysqli_query($conecta,$query1);
            $a=mysqli_fetch_array($res);
            echo $a[0];    
            
            
            ?>" readOnly placeholder="Digite el Correo del Cliente"  size="45">
            </td>
                                  
           
            </tr>
            <tr>
                <td colspan="4">
                    <center>
                        <button name="elimina" type="submit"> Eliminar</button>

                        <a href="productos.php">
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