<?php
include('../conexion/conexion.php');
include('../modelos/proveedoresModelos.php');
?>
<?php
$obj = new Proveedores();
if ($_POST) {
    $obj->codigoProveedores  = $_POST['codigoProveedores '];
    $obj->nombreProveedores = $_POST['nombreProveedores'];
    $obj->apellidoProveedores = $_POST['apellidoProveedores'];
    $obj->direccionProveedores = $_POST['direccionProveedores'];
    $obj->telefonoProveedores = $_POST['telefonoProveedores'];
    $obj->ciudadProveedores = $_POST['ciudadProveedores'];
    $obj->correoProveedores = $_POST['correoProveedores'];
    $obj->contraseñaProveedores = $_POST['contraseñaProveedores'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="shortcut icon" href="./images/faviconCascoEnviosP.O.S software.png " type="image/x-icon">
    <link rel="stylesheet" href="../CSS/eestilos_php.css">



</head>

<body>

    <header>
        <section class="body_estilo">
            <center>
                <form action="" name="proveedores" id="proveedores" method="POST">
                    <h2>Crear Proveedor</h2>
                    <table border="1">
                        <tr>
                            <td>Codigo</td>
                            <td><input type="text" name="codigoProveedores" id="codigoProveedores" placeholder="Codigo Asigando por el Sistema" size="45"></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombreProveedores" id="nombreProveedores" placeholder="Digite el Nombre del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td><input type="text" name="apellidoProveedores" id="apellidoProveedores" placeholder="Digite el apellido del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td><input type="text" name="direccionProveedores" id="direccionProveedores" placeholder="Digite la Direccion del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="text" name="telefonoProveedores" id="telefonoProveedores" placeholder="Digite el Telefono del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td><input type="text" name="ciudadProveedores" id="ciudadProveedores" placeholder="Digie la ciudad del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td><input type="text" name="correoProveedores" id="correoProveedores" placeholder="Digite el correo del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="text" name="contraseñaProveedores" id="contraseñaProveedores" placeholder="Digie la contraseña del Proveedor" size="45"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button name="agregar" type="submit"> Guardar</button>
                                    <a href="proveedores.php">
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