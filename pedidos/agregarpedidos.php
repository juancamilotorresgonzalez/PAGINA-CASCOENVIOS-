<?php
 include('../conexion/conexion.php');
 include("../modelos/pedidosmodelo.php");
?>
<?php
$obj = new pedidos();
if($_POST){
    $obj->codigoPedido = $_POST['codigoPedido'];
    $obj->fechaPedido = $_POST['fechaPedido'];
    $obj->horaPedido = $_POST['horaPedido'];
    $obj->documentoCliente = $_POST['documentoCliente'];
}

$c = new Conexion();
$cone = $c->conectar_al_servidor();
$p = "select * from clientes";
$res = mysqli_query($cone,$p);
$arreglo = mysqli_fetch_assoc($res);


?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
         	
        <title>Modulo Pedidos</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="pedidos" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>pedidos</center></td>
                        </tr>
                        <tr>
                            <td>Código</td>
                            <td><input size="10" type="text" name="codigoPedido" id="codigoPedido" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input size="40" type="date" name="fechaPedido" id="fechaPedido" placeholder="Fecha del pedido"></td>
                        </tr>
                        <tr>
                            <td>Hora</td>
                            <td><input size="40" type="time" name="horaPedido" id="horaPedido" placeholder="Hora del pedido"></td>
                        </tr>
                        <tr>
                            <td>documentoCliente</td>
                            <td><input size="40" type="text" name="documentoCliente" id="documentoCliente" placeholder="Documento del cliente"></td>
                        </tr>
                        <tr>
                            <td>Categoria</td>
                            <td>
                                <select name="codigoDocumento" id="$obj->codigoDocumento">
                                    <option>[Seleccione el Codigo]</option>
                                    <option>
                                        <?php
                                            do{
                                                $codigo = $arreglo['codigoDocumento'];
                                                $nombre = $arreglo['nombreCliente '];
                                                if($codigo == $obj->codigoDocumento){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($arreglo = mysqli_fetch_assoc($res));

									        $row = mysqli_num_rows($res);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($arreglo,0);
										            $arreglo = mysqli_fetch_assoc($res);
									                }


                                        ?>
                                    </option>    
                                </select>   
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="guarda">Guardar</button>
                                    <a href="pedidos.php">
                                             <button type="button" name="salir">Salir</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>