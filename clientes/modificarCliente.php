<?php 
    include('../conexion/conexion.php');
    include('../modelos/clientesModelos.php');
?>
<?php
$obj = new Cliente();
if($_POST){
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
        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from clientes where documentoCliente = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->documentoCliente = $arreglo[0];
        $obj->codigoDocumento = $arreglo[1];
        $obj->nombreCliente = $arreglo[2];
        $obj->apellidoCliente = $arreglo[3];
        $obj->telefonoCliente = $arreglo[4];
        $obj->contraseñaCliente = $arreglo[5];
        $obj->ciudadCliente = $arreglo[6];
        $obj->correoCliente = $arreglo[7];




?>
<?php

        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query2 = "select * from documentos";
        $resultado2 = mysqli_query($conecta,$query2);
        $arreglo2 = mysqli_fetch_assoc($resultado2);


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
    <form action="" name="clientes" id="cliente" method="POST">
        <h2>Modificar Cliente</h2>
        <table border="1">
            <tr>
                <td>Numero Documento</td>
                <td><input type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente  ?>" readOnly placeholder="Digite el Documento del Cliente"  size="30"></td>
            
                <td>Seleccione el Documento</td>
                <td>                                  
                    <select name="codigoDocumento" id="codigoDocumento">
                    <option>
                    <?php
                    $clas = new Conexion();
                    $conecta = $clas->conectar_al_servidor();
                    $query1 = "SELECT nombreDocumento from documentos where codigoDocumento ='$obj->codigoDocumento'";
                    $res=mysqli_query($conecta,$query1);
                    $a=mysqli_fetch_array($res);
                    echo $a[0];                              
                                
                                    do{
                                       $identidad = $arreglo2['codigoDocumento'];
                                       $nombre =    $arreglo2['nombreDocumento']; 
                                       if($identidad == $obj->codigoDocumento){
                                           echo "<option value=$identidad=>$nombre";
                                       }else{
                                            echo "<option value=$identidad>$nombre";
                                           }                                      
                                    }while($arreglo2 = mysqli_fetch_assoc($resultado2));
                                    $row = mysqli_num_rows($resultado2);
                                    $rows=0;
                                    if($rows>0){
                                                mysqli_data_seek($arreglo2,0);
                                                $arreglo2 = mysqli_fetch_assoc($resultado2);
                                    }
                                ?> 
                        </option>
                    </select>
            </td>
            </tr>
            <tr>
                <td>Numero Documento</td>
                <td><input type="text" name="documentoCliente" id="documentoCliente" value="<?php echo $obj->documentoCliente  ?>"  readOnly placeholder="Digite el Documento del Cliente"  size="30"></td>
            
                <td>Seleccione el Documento</td>
                <td><input type="checkbox" name="codigoDocumento" id="codigoDocumento" value="<?php echo $obj->codigoDocumento  ?>" readOnly  size="45"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombreCliente" id="nombreCliente" value="<?php echo $obj->nombreCliente  ?>" placeholder="Digite el Nombre del Cliente"  size="45"></td>
            
                <td>Apellido</td>
                <td><input type="text" name="apellidoCliente" id="apellidoCliente" value="<?php echo $obj->apellidoCliente  ?>" placeholder="Digite el Apellido del Cliente"  size="45"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="number" name="telefonoCliente" id="telefonoCliente" value="<?php echo $obj->telefonoCliente  ?>"  placeholder="Digite el Telefono del Cliente"  size="45"></td>
            
                <td>contraseña</td>
                <td><input type="password" name="contraseñaCliente" id="contraseñaCliente" value="<?php echo $obj->contraseñacliente  ?>"  readOnly placeholder="Digite la contraseña del Cliente"  size="45"></td>

            </tr>
            <tr>
            <td>Ciudad</td>
                <td><input type="text" name="ciudadCliente" id="ciudadCliente" value="<?php echo $obj->ciudadcliente  ?>"  placeholder="Digite la ciudad del Cliente"  size="45"></td>
                
                <td>Correo Electronico</td>
                <td><input type="email" name="correoCliente" id="correoCliente" value="<?php echo $obj->correoCliente  ?>" placeholder="Digite el Correo del Cliente"  size="45"></td>
            </tr>
            <tr>
                <td colspan="4">
                    <center>
                        <button name="modificar" type="submit"> Modificar</button>
                        <a href="clientes.php">
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