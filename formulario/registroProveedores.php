<?php 
    include('../conexion/conexion.php');
    include('../modelos/proveedoresModelos.php');
?>
<?php
$obj = new Proveedores();
if($_POST){
    $obj->documentoCliente = $_POST['documentoCliente'];
    $obj->codigoProveedores = $_POST['codigoProveedores'];
    $obj->nombreProveedores = $_POST['nombreProveedores'];
    $obj->apellidoProveedores = $_POST['apellidoProveedores'];
    $obj->telefonoProveedores = $_POST['telefonoProveedores'];
    $obj->direccionProveedores = $_POST['direccionProveedores'];
    $obj->ciudadProveedores = $_POST['ciudadProveedores'];
    $obj->correoProveedores = $_POST['correoProveedores'];
    $obj->contraseñaCliente = $_POST['contraseñaProveedores'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistroProveedores</title>
</head>
<body>
    <center>
    <form action="" name="proveedores" id="proveedores" method="POST">
        <h2>Registro Cliente</h2>
        <p><strong>El siguiente formulario es necesario diligenciar para el uso optimo de nuestros servicios agradecemos su comprension.</strong></p>
        <table border="1">
            <tr>
                <td>Numero Documento</td>
                <td><input type="text" name="documentoCliente" id="documentoCliente" placeholder="Digite el Documento del Proveedor"  size="30"></td>
            
                <td>Seleccione el Documento</td>
                <td><input type="text" name="codigoProveedores" id="codigoProveedores"  size="45"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombreProveedores" id="nombreProveedores" placeholder="Digite el Nombre del Proveedor"  size="45"></td>
            
                <td>Apellido</td>
                <td><input type="text" name="apellidoProveedores" id="apellidoProveedores" placeholder="Digite el Apellido del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="telefonoProveedores" id="telefonoProveedores" placeholder="Digite el Telefono del Proveedor"  size="45"></td>
            </tr>
                <td>Direccion</td>
                <td><input type="text" name="direccionProveedores" id="direccionProveedores" placeholder="Digite la direccion del Proveedor"  size="45"></td>
                <td>ciudad</td>
                <td><input type="text" name="ciudadProveedores" id="ciudadProveedores" placeholder="Digite el Nombre de la Ciudad"  size="45"></td>
            
                <td>Correo Electronico</td>
                <td><input type="text" name="correoProveedores" id="correoProveedores" placeholder="Digite el Correo del Proveedor"  size="45"></td>
            </tr>            
            <tr>
                <td>contraseña</td>
                <td><input type="number" name="contraseñaProveedores" id="contraseñaProveedores" placeholder="Digite el Numero de Contraseña"  size="45"></td>
            </tr>
            <tr>

            <tr>
                <td colspan="4">
                    <center>
                        <button name="agregar" type="submit"> Guardar</button>
                        <a href="proveedoresModelos.php">
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