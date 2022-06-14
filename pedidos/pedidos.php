<?php
 include('../conexion/conexion.php');
?>
<?php
if($_POST){
            $obj->documentoCliente  = $_POST['documentoCliente '];
            
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
   
    $c = new Conexion();
    $cone = $c->conectar_al_servidor();
    $sql = "select clientes.documentoCliente ,clientes.nombreCliente,documentos.codigoDocumento from clientes inner join documentos on clientes.codigoDocumento  = documentos.codigoDocumento  where nombreCliente like '%$obj->nombreCliente%'";
    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
    $resultado = mysqli_query($cone,$limite);
    $arreglo = mysqli_fetch_row($resultado);
}
else{
    $c = new Conexion();
    $cone = $c->conectar_al_servidor();
    $sql = "select clientes.documentoCliente ,clientes.nombreCliente,documentos.codigoDocumento from clientes inner join documentos on clientes.codigoDocumento  = documentos.codigoDocumento";
    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
    $resultado = mysqli_query($cone,$limite);
    $arreglo = mysqli_fetch_row($resultado);
}
?>
<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($cone,$sql);
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

<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
        
        	
        <title>Modulo pedidos</title>
    </head>
    <body>
        <center>
          <br>   
            <h3 class=" text-danger font-weight-normal  " >pedidos</h3> 
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <form name="carreteras" action="" method="POST">
            <table >
                 <tr>
                    <td>
                             <a  href="agregarpedidos.php">
                                    <button type="button" class="btn btn-primary btn-sm "><i class="fa fa-file-text-o" aria-hidden="true"></i> Agregar</button>
                              </a>
                    </td>
                </tr>
                 <tr>
		                <th><label for="idcliente">Buscar</label></th>
		                <th><input style="font-size:12px" type="text" id="nombreCliente" name="nombreCliente"   placeholder="Digite el Nombre del cliente para Consultar" size="50" >
                            <button type="submit" name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
		                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Refrescar</button>
		                </th>
		                <th><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</button> </th>
                </tr>

            </table>
        </center>  
            <br>  
            <center>
                <table class="table  table-bordered table-hover table-sm " style="width:90%">
                        <caption><small>Lista de clientes</small></caption>  
                        <thead>
                            <tr class="bg-danger">
                                <th scope="col" style="width:10%"  class="text-light letra">Id</th>
                                <th scope="col" style="width:15%" class="text-light letra">Nombre</th>
                                <th scope="col" style="width:15%" class="text-light letra">Categoria</th>
                                <th scope="col" style="width:5%"  class="text-light letra">Modificar</th>
                                <th scope="col" style="width:5%"  class="text-light letra">Eliminar</th>
                            </tr>
                        </thead>
                        <?php
                            do{
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $arreglo[0] ?></td>
                                <td><?php echo $arreglo[1] ?></td>
                                <td><?php echo $arreglo[2] ?></td>
                                <td class="letra">
                                    <a href="<?php if($arreglo[0] <> ""){
                                            echo "modificarpedidos.php?key=".urlencode($arreglo[0]);
                                    }else{
                                        echo"<script> alert('Debe de consultar primero')</sccript>";
                                    }
                                    
                                    ?>">
                                    <button name="modi" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
                                    </a> 
                                </td>
                                <td class="letra">
                                <a href="<?php if($arreglo[0]<>""){
                                            echo "eliminarpedidos.php?key=".urlencode($arreglo[0]);
                                    }else{
                                        echo"<script> alert('Debe de consultar primero')</sccript>";
                                    }
                                

                                ?>">
                                    <button name="elim" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                </a> 
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            }while($arreglo = mysqli_fetch_row($resultado));
                        ?>
                </table> 
                <h6><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></h6>
                <table border=0>
  	           
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
    </body> 
</html>