<?php 
    include('../conexion/conexion.php');
    include('../modelos/proveedoresModelos.php');
?>
<?php
$obj = new Proveedores();
if($_POST){
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
<?php
$llave = $_GET['key'];
echo $llave;
if(isset($_POST['eliminar'])){

    $obj->codigoProveedores  = $_POST[' '];
    $obj->nombreProveedores = $_POST[''];  
    $obj->apellidoProveedores = $_POST[''];    
    $obj->direccionProveedores = $_POST[''];  
    $obj->telefonoProveedores = $_POST[''];  
    $obj->ciudadProveedores = $_POST[''];  
    $obj->correoProveedores = $_POST[''];  
    $obj->contraseñaProveedores = $_POST['']; 

}else{
 
echo $llave;
        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from proveedores where codigoProveedores = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->codigoProveedores = $arreglo[0];
        $obj->nombreProveedores = $arreglo[1];
        $obj->apellidoProveedores = $arreglo[2];
        $obj->direccionProveedores = $arreglo[3];
        $obj->telefonoProveedores = $arreglo[4];
        $obj->ciudadProveedores = $arreglo[5];
        $obj->correoProveedores = $arreglo[6];
        $obj->contraseñaProveedores = $arreglo[7];

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <h2>Eliminar Proveedor</h2>
        <table border="1">
            <tr>
                <td>Codigo</td>
                <td><input type="text" name="codigoProveedores" id="codigoProveedores" value="<?php echo $obj->codigoProveedores  ?>" readOnly placeholder="Digite el Documento del Proveedor"  size="30"></td>
                      
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombreProveedores" id="nombreProveedores" value="<?php echo $obj->nombreProveedores  ?>" readOnly placeholder="Digite el Nombre del Proveedor"  size="45"></td>
            </tr>
            <tr>    
                <td>Apellido</td>
                <td><input type="text" name="apellidoProveedores" id="apellidoProveedores" value="<?php echo $obj->apellidoProveedores  ?>" readOnly placeholder="Digite el apellido del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" name="direccionProveedores" id="direccionProveedores" value="<?php echo $obj->direccionProveedores  ?>" readOnly placeholder="Digite la Direccion del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="telefonoProveedores" id="telefonoProveedores" value="<?php echo $obj->telefonoProveedores  ?>" readOnly placeholder="Digite el Telefono del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td><input type="text" name="ciudadProveedores" id="ciudadProveedores" value="<?php echo $obj->ciudadProveedores  ?>" readOnly placeholder="Digie la ciudad del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="text" name="correoProveedores" id="correoProveedores" value="<?php echo $obj->correoProveedores  ?>" readOnly placeholder="Digite el correo del Proveedor"  size="45"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="text" name="contraseñaProveedores" id="contraseñaProveedores" value="<?php echo $obj->contraseñaProveedores  ?>" readOnly placeholder="Digite la contraseña del Proveedor"  size="45"></td>
            </tr>
                <tr>
                <td colspan="4">
                    <center>
                        <button name="eliminar" type="submit"> Eliminar</button>

                        <a href="proveedores.php">
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