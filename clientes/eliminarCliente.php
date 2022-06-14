<?php
include('../conexion/conexion.php');
include('../modelos/clientesModelos.php');
?>
<?php
$obj = new Cliente();
if ($_POST) {
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->contraseñaCliente = $_POST['contraseñaCliente'];
    $obj->ciudadCliente = $_POST['ciudadCliente'];
    $obj->correoCliente = $_POST['correoCliente'];
}
?>
<?php
$llave = $_GET['key'];
echo $llave;
if (isset($_POST['elimina'])) {

    $obj->documentoCliente = "";
    $obj->codigoDocumento = "";
    $obj->nombreCliente = "";
    $obj->apellidoCliente = "";
    $obj->telefonoCliente = "";
    $obj->contraseñaCliente = "";
    $obj->ciudadCliente = "";
    $obj->correoCliente = "";
} else {

    $clas = new Conexion();
    $conecta = $clas->conectar_al_servidor();
    $query = "select * from clientes where documentoCliente = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->documentoCliente = $arreglo[0];
    $obj->codigoDocumento = $arreglo[1];
    $obj->nombreCliente = $arreglo[2];
    $obj->apellidoCliente = $arreglo[3];
    $obj->telefonoCliente = $arreglo[4];
    $obj->contraseñaCliente = $arreglo[5];
    $obj->ciudadCliente = $arreglo[6];
    $obj->correoCliente = $arreglo[7];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
     <link rel="stylesheet" href="../CSS/eestilos_php.css">
</head>

<body>

    <header>
        <section class="body_estilo">

            <center>
                <form action="" method="POST">
                    <h2>Eliminar Clientes</h2>
                    <table border="1">
                        <tr>
                            <td>Numero Documento</td>
                            <td><input type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente  ?>" readOnly placeholder="Digite el Documento del Cliente" size="30"></td>

                            <td>Seleccione el Documento</td>
                            <td><input type="checkbox" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento  ?>" readOnly size="45"></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombreCliente" id="nombreCliente" value="<?php echo $obj->nombreCliente  ?>" readOnly placeholder="Digite el Nombre del Cliente" size="45"></td>

                            <td>Apellido</td>
                            <td><input type="text" name="apellidoCliente" id="apellidoCliente" value="<?php echo $obj->apellidoCliente  ?>" readOnly placeholder="Digite el Apellido del Cliente" size="45"></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="number" name="telefonoCliente" id="telefonoCliente" value="<?php echo $obj->telefonoCliente  ?>" readOnly placeholder="Digite el Telefono del Cliente" size="45"></td>

                            <td>contraseña</td>
                            <td><input type="password" name="contraseñaCliente" id="contraseñaCliente" value="<?php echo $obj->contraseñacliente  ?>" readOnly placeholder="Digite la contraseña del Cliente" size="45"></td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td><input type="text" name="ciudadCliente" id="ciudadCliente" value="<?php echo $obj->ciudadcliente  ?>" readOnly placeholder="Digite la ciudad del Cliente" size="45"></td>

                            <td>Correo Electronico</td>
                            <td><input type="email" name="correoCliente" id="correoCliente" value="<?php echo $obj->correoCliente  ?>" readOnly placeholder="Digite el Correo del Cliente" size="45"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button name="eliminar" type="submit"> Eliminar</button>

                                    <a href="clientes.php">
                                        <button name="salir" type="button">Salir</button>
                                    </a>
                                </center>
                            </td>
                        </tr>

                    </table>
                </form>
            </center>
        </section>
    </header>
</body>

</html>