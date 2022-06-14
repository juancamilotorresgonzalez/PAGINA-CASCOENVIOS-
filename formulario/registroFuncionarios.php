<?php 
    include('../conexion/conexion.php');
    include('../modelos/usuariosModelos.php');
?>
<?php
$obj = new Usuarios();
if($_POST){
    $obj->codigoUsuario = $_POST['codigoUsuario'];
    $obj->codigoDocumento = $_POST['codigoDocumento'];
    $obj->nombreUsuario = $_POST['nombreUsuario'];
    $obj->apellidoUsuario = $_POST['apellidoUsuario'];
    $obj->telefonoUsuario = $_POST['telefonoUsuario'];
    $obj->ciudadUsuario = $_POST['ciudadUsuario'];
    $obj->correoUsuario = $_POST['correoUsuario'];
    $obj->contraseñaUsuario = $_POST['contraseñaUsuario'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <center>
    <form action="" name="usuario" id="usuario" method="POST">
        <h2>Registro Funcionarios</h2>
        <p><strong>El siguiente formulario es necesario diligenciar para el uso optimo de nuestros servicios agradecemos su comprension.</strong></p>
        <table border="1">
            <tr>
                <td>Numero Documento</td>
                <td><input type="text" name="codigoUsuario" id="codigoUsuario" placeholder="Digite el Documento del Usuario"  size="30"></td>
            
                <td>Seleccione el Documento</td>
                <td><input type="text" name="codigoDocumento" id="codigoDocumento"  size="45"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Digite el Nombre del Usuario"  size="45"></td>
            
                <td>Apellido</td>
                <td><input type="text" name="apellidoUsuario" id="apellidoUsuario" placeholder="Digite el Apellido del Usuario"  size="45"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="telefonoUsuario" id="telefonoUsuario" placeholder="Digite el Telefono del Usuario"  size="45"></td>
            </tr>
                <td>ciudad</td>
                <td><input type="text" name="ciudadUsuario" id="ciudadUsuario" placeholder="Digite el Nombre de la Ciudad"  size="45"></td>
            
                <td>Correo Electronico</td>
                <td><input type="text" name="correoUsuario" id="correoUsuario" placeholder="Digite el Correo del Usuario"  size="45"></td>
            </tr>            
            <tr>
                <td>contraseña</td>
                <td><input type="number" name="contraseñaUsuario" id="contraseñaUsuario" placeholder="Digite el Numero de Contraseña"  size="45"></td>
            </tr>
            <tr>

            <tr>
                <td colspan="4">
                    <center>
                        <button name="agregar" type="submit"> Guardar</button>
                        <a href="usuariosModelos.php">
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