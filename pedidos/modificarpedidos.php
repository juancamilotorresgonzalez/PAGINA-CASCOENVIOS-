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
?>
<?php
$llave = $_GET['key'];
echo $llave;
$c = new Conexion();
$cone = $c->conectar_al_servidor();
$sql = "select * from pedidos where codigoPedido = '$llave'";
$resultado = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($resultado);
    $obj->codigoPedido = $arreglo[0];
    $obj->fechaPedido = $arreglo[1];
    $obj->horaPedido = $arreglo[2];
    $obj->documentoCliente = $arreglo[3];
?>



<?php
$c = new Conexion();
$cone = $c->conectar_al_servidor();
$p = "select * from categorias";
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
                            <td colspan="2"><center>Pedidos</center></td>
                        </tr>
                        <tr>
                            <td>Código</td>
                            <td><input readOnly size="10" type="number" name="codigoPedido" id="codigoPedido" value="<?php echo $obj->codigoPedido ?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input size="40" type="date" name="fechaPedido" id="fechaPedido" value="<?php echo $obj->fechaPedido  ?>" placeholder="Fecha del pedido"></td>
                        </tr>
                        <tr>
                            <td>Hora</td>
                            <td><input size="40" type="time" name="horaPedido" id="horaPedido" value="<?php echo $obj->horaPedidoo  ?>" placeholder="Hora del pedido"></td>
                        </tr>
                        <tr>
                            <td>documentoCliente</td>
                            <td><input size="40" type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente  ?>" placeholder="Documento del cliente"></td>
                        </tr>
                        <tr>
                            <td>Categoria</td>
                            <td>
                         
                                <select name="idcategorias" id="$obj->idcategorias">
                                    
                                    
                                   
                                    
                                    <?php  
                                    
                                    $c = new Conexion();
                                    $cone = $c->conectar_al_servidor();
                                    $p2 = "select * from categorias where idcategorias='$obj->idcategorias'";
                                    $res2 = mysqli_query($cone,$p2);
                                    $arreglo2 = mysqli_fetch_row($res2);
                                    echo $arreglo2[1];
                                 
                                            
                                        

                                ?>
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
                                     
                                </select>   
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="modifica"> Modificar</button>
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