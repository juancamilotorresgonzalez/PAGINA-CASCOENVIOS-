<?php 
    include('../conexion/conexion.php');
    include('../modelos/entradasModelos.php');
?>
<?php
$obj = new  Entradas();
if($_POST){
    $obj->codigoEntrada = $_POST['codigoEntrada'];
    $obj->codigoProducto = $_POST['codigoProducto'];
    $obj->fechaEntrada = $_POST['fechaEntrada'];
    $obj->numerofactura = $_POST['numerofactura'];
    $obj->cantidadEntrada = $_POST['cantidadEntrada'];
    $obj->valorUnitarioEntrada = $_POST['valorUnitarioEntrada'];
    $obj->totalEntrada = $_POST['totalEntrada'];
}
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
    <form action="" name="entrada" id="entrada" method="POST">
        <h2>Crear Entradas</h2>
        <table border="1">
            <tr>
                <td>Codigo</td>
                <td><input type="text" name="codigoEntrada" id="codigoEntrada" placeholder="Codigo Asigando Por el Sistema"  size="30"></td>
                      
                <td>Nombre</td>
                <td><input type="text" name="codigoProducto" id="codigoProducto" placeholder="Digite el Nombre del Producto"  size="45"></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><input type="date" name="fechaEntrada" id="fechaEntrada" placeholder="Digite la fecha de entrada"  size="45"></td>
                <td>Factura de Compra</td>
                <td><input type="text" name="numerofactura" id="numerofactura"  placeholder="Digite la Factura"  size="45"></td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td><input type="text" name="cantidadEntrada" id="cantidadEntrada" placeholder="Digite la Cantidad"  size="45"></td>
                <td>Valor Unitario</td>
                <td><input type="text" name="valorUnitarioEntrada" id="valorUnitarioEntrada" placeholder="Digite el Valor del Producto"  size="45" onBlur="suma()"></td>
            </tr>
            <tr>
            <td>Valor</td>
            <td><input type="text" name="totalEntrada" id="totalEntrada" placeholder="Digite el Valor Entrada"  size="45"></td>
            
            
            </tr>
            
            <tr>
                <td colspan="4">
                    <center>
                        <button name="agregar" type="submit"> Guardar</button>
                        <a href="Entradas.php">
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
<script>
    function suma(){
        //alert("hola");
        var cantidad = entrada.cantidadEntrada.value;
       // alert(cantidad);
        var unitario = entrada.valorUnitarioEntrada.value;
      //alert(unitario);
        var total = parseInt(cantidad)*parseInt(unitario);
      
        entrada.totalEntrada.value = total;

    }
</script>    