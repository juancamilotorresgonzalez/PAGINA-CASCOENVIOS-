<?php
include('../conexion/conexion.php');
?>
<?php
if($_POST){
   $obj->nombreProducto = $_POST['nombreProducto'];  
  
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"]; 
$maximoDatos = 5;
$paginaNumero = 0;

if(isset($_GET['paginaNumero'])){
   $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php
if(isset($_POST['consulta'])){
   echo "<script>alert('llegue')</script>";
        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from productos where nombreProducto like
        '%$obj->nombreProducto%' ";
        $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
        $resultado = mysqli_query($conecta,$limite);
        $arreglo = mysqli_fetch_row($resultado);
        
}else{
        $clas = new Conexion();
        $conecta = $clas->conectar_al_servidor();
        $query = "select * from productos";
        $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
        $resultado = mysqli_query($conecta,$limite);
        $arreglo = mysqli_fetch_row($resultado);
}
?>
<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($conecta,$query);
		$totalArreglo = mysqli_num_rows($lista);
	}
$totalPagina = ceil($totalArreglo/$maximoDatos)-1;

?>
<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ 
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); 
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <center>
        <h2>Productos</h2>
        <form action="" name="productos" method="POST">
        <table width="500">
            <tr>
                <td>
                    <a href="agregarProductos.php">
                        <button type="button" name="agregar" value="Agregar" >Agregar</button>
                    </a>
                </td>
                <td>
                    <h3>Buscar</h3>
                </td>
                <td>
                    <input type="text" name="nombreProducto" id="nombreProducto" placeholder="Digite el Nombre del Producto" size="50" >
                </td>
                <td>
                    <button type="submit" name="consulta" value="consulta" >Buscar</button>
                </td>
                <td>
                    <button type="submit" name="refrescar" value="refrescar" >Listar</button>
                </td>
                <td>
                    <button type="button" name="salir" value="salir" >Salir</button>
                </td>
            </tr>
            
        </table>
        <br>
        <hr>
        <br>
            <table border="1" width="1000">
                    <thead>
                        <tr>
                            <td><center>Codigo</center></td>
                            <td><center>Nombre</center></td>
                            <td><center>Entrada</center></td>
                            <td><center>Salida</center></td>
                            <td><center>Existencias</center></td>
                            <td><center>Valor</center></td>
                            <td><center>Modificar</center></td>
                            <td><center>Eliminar</center></td>
                            <td><center>Entradas</center></td>
                        </tr>
                    </thead>
                    <?php
                    if($arreglo>0){
                    
                        do{
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $arreglo[0]; ?></td>
                            <td><?php echo $arreglo[1]; ?></td>
                            <td><?php echo $arreglo[2]; ?></td>
                            <td><?php echo $arreglo[3]; ?></td>
                            <td><?php echo $arreglo[4]; ?></td>
                            <td><?php echo $arreglo[5]; ?></td>
                            <td>
                                <a href="<?php if($arreglo[0]<>""){
                                    echo "modificarProductos.php?key=".urlencode($arreglo[0]);
                                }?>">                 
                                    <button type="button" name="modificar" value="modificar" >Modificar
                                    </button>
                                </a>
                           </td>
                           <td>
                           <a href="<?php if($arreglo[0]<>""){
                                    echo "eliminarProductos.php?key=".urlencode($arreglo[0]);
                                }?>">  
                                <button type="button" name="eliminar" value="eliminar" >Eliminar
                                </button>
                                </a>
                           </td>
                           <td>
                                <a href="<?php if($arreglo[0]<>""){
                                    echo "Entradas.php?key=".urlencode($arreglo[0]);
                                }?>">                 
                                    <button type="button" name="entradas" value="entradas" >Entradas
                                    </button>
                                </a>
                           </td>
                        </tr>

                    </tbody>
                <?php                
                    }while($arreglo = mysqli_fetch_row($resultado));
                }else{
                    echo "No existen Registros";
                }
                ?>
            </table>
            <br>
            <hr>
            <h6><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></h6>
            <table border=1>
  	          <tr>
                <td> 
                    <?php  
                        if($paginaNumero > 0){
                    ?> 
                     <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina,0,$cargarPagina) ?>" id="paginador"> < Inicio </a> <?php }?>
                </td>
                <td>
                    <?php  
                    if($paginaNumero > 0){
                ?> 
                    <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>" id="paginador" > << Anterior </a> <?php }?></td>
                <td>
                    <?php 
                    if($paginaNumero < $totalPagina ){
                    ?>
                     <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>" id="paginador"> Siguiente >>  </a> <?php }?></td>
                <td>
                <?php 
                    if($paginaNumero < $totalPagina ){
                ?> 
                <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, $totalPagina,$cargarPagina) ?>" id="paginador"> Ultima ></a> <?php } ?></td>
            
                </tr>
				</table>            


	        </center>
        </form> 
    </center>
</body>
</html>