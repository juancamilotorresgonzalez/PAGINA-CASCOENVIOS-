<?php
include 'conexion.php';
$id=$_GET['id'];
$conecta = $clas->conectar_al_servidor();
$query="select * from pedidos where Id='".$id."'";
$resultado=mysqli_query($conecta,$query);
$arreglo = mysqli_fetch_row($resultado);
while ($fila=mysqli_fetch_assoc($resultado)) {
    
}
?>
<div>
    <form>
    <input type="hidden" name="txtid" value="<?php echo $arreglo["Id"] ?>"><br>
    <label>Usuario</label><br>        
    <input type="text" name="usuario" value="<?php echo $arreglo["usuario"] ?>"><br>
    <label>Correo</label><br> 
    <input type="text" name="correo electronico" value="<?php echo $arreglo["correo"] ?>"><br>
    <label>Contraseña</label>
    <input type="number" name="contraseña" value="<?php echo $arreglo["password"] ?>"><br>
    <label>telefono</label>
    <input type="text" name="telefono" value="<?php echo $arreglo["phonenumber"] ?>"><br>
    <label>ciudad</label>
    <input type="text" name="ciudad" value="<?php echo $arreglo["city"] ?>"><br>
    <input type="submit" name="" value="actualizar">
    <a href="index.php">Regresar</a>
    </form>
    <?php  ?>
</div>
<?php
$idp=$_GET['txtid'];
$user=$_GET['usuario'];
$email=$_GET['correo electronico'];
$password=$_GET['contraseña'];
$phonenumber=$_GET['telefono'];
$city=$_GET['ciudad'];
if ($user!=null||$email!=null||$password!=null||$phonenumber!=null||$city!=null) {
    $sql2="update pedidos set Usuario='".$user."',Email='".$email."',password='".$password.
    "',phonenumber='".$phonenumber."',city='".$city."'where Id='".$idp."'";
    mysqli_query($conecta,$query2);
    if ($user=1) {
        header("location:conexion.php");
    }
    
}

?>