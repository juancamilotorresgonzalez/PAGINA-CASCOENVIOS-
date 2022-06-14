<?php 
    include('../conexion/conexion.php');
    include('../modelos/documentosModelos.php');
?>
<?php
$obj = new Documento();
if($_POST){
  //  echo "estoy en el post";
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->numeroDocumento = $_POST['numeroDocumento'];
}

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
        
    <form action="" name="Documentos" id="Documentos" method="POST">
        <h2>Crear Documentos</h2>
        <table border="1">
            <tr>
                <td>Código</td>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento" placeholder="Codigo Asignado por el Sistema"  size="30"></td>
            </tr>
            <tr>
                <td>Numero</td>
                <td><input type="text" name="numeroDocumento" id="numeroDocumento" placeholder="Digite el numero del Documento" size="45"></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <center>
                        <button name="agregar" type="submit"> Guardar</button>
                        <a href="Documentos.php">
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