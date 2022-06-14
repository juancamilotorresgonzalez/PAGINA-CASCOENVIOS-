<?php 
    include('../conexion/conexion.php');
    include('../modelos/documentosModelos.php');
?>
<?php
$obj = new Documento();
if($_POST){
    
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->numeroDocumento = $_POST['numeroDocumento'];
}
?>
<?php
$llave = $_GET['key'];
echo $llave;
        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from documentos where codigoDocumento = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->codigoDocumento = $arreglo[0];
        $obj->numeroDocumento = $arreglo[1];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <h2>Modificar Documentos</h2>
        <table border="1">
            <tr>
                <td>Código</td>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento ?>" placeholder="Codigo Asignado por el Sistema" size="30"></td>
            </tr>
            <tr>
                <td>Numero</td>
                <td><input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo $obj->numeroDocumento ?>" placeholder="Digite el nombre del Documento" size="45"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button name="modificar" type="submit"> Modificar</button>
                        <a href="documentos.php">
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