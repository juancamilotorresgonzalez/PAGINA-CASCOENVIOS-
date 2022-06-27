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
    $obj->contrasenaCliente = $_POST['contraseñaCliente'];
    $obj->ciudadCliente = $_POST['ciudadCliente'];
    $obj->correoCliente = $_POST['correoCliente'];
}
?>
<?php

$clas = new Conexion();
$conecta = $clas->conectar_al_servidor();
$query = "select * from documentos";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_assoc($resultado);
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
        <section class="body_estilo2">

            <center>
                <form action="" name="clientes" id="clientes" method="POST" enctype="multipart/form-data">
                    <h2>Crear Cliente</h2>
                    <table border="1">
                        <tr>
                            <td>Numero Documento</td>
                            <td><input type="text" name="codigoDocumento" id="codigoDocumento" placeholder="Digite el Documento del Cliente" size="30"></td>

                            <td>Seleccione el Documento</td>
                            <td>
                                <select name="documentoCliente">  
                                    <?php   
                                        foreach ($resultado as $product): 
                                    ?>
                                        <option value="<?php echo($product["codigoDocumento"])?>" ><?php echo($product["numeroDocumento"])?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombreCliente" id="nombreCliente" placeholder="Digite el Nombre del Cliente" size="45"></td>

                            <td>Apellido</td>
                            <td><input type="text" name="apellidoCliente" id="apellidoCliente" placeholder="Digite el Apellido del Cliente" size="30"></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="text" name="telefonoCliente" id="telefonoCliente" placeholder="Digite el Telefono del Cliente" size="45"></td>

                            <td>Correo Electronico</td>
                            <td><input type="text" name="correoCliente" id="correoCliente" placeholder="Digite el Correo del Cliente" size="30"></td>
                        </tr>
                        <tr>
                            <td>Contraseña Cliente</td>
                            <td><input type="password" name="contraseñaCliente" id="contraseñaCliente" placeholder="Digite la contraseña del Cliente" size="45"></td>

                            <td>Ciudad Cliente</td>
                            <td><input type="text" name="ciudadCliente" id="ciudadCliente" placeholder="Digite la ciudad del Cliente" size="30"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <button name="agregar" type="submit"> Guardar</button>
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