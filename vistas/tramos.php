<?php
 include('../conexion/conexion.php');
?>
<?php
    $c = new Conexion();
    $cone = $c->conectar_al_servidor();
    $sql = "select * from tramos";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);

?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/julios.css">
        
        	
        <title>Modulo Tramos</title>
    </head>
    <body>
        <center>
          <br>   
            <h3 class=" text-danger font-weight-normal  " >Tramos</h3> 
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <form name="tramos" action="" method="POST">
            <table >
                 <tr>
                    <td>
                             <a  href="clientesAgregar.php"><button type="button" class="btn btn-primary btn-sm "><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a>
                    </td>
                </tr>
                 <tr>
		                <th><label for="idcliente">Buscar</label></th>
		                <th><input style="font-size:12px" type="text" id="idCliente" name="idCliente"   placeholder="Digite el Documento para Consultar" size="50" >
                            <button type="submit" name="consulta" class="btn btn-warning btn-sm" ><i class="fa fa-search" aria-hidden="true"></i></button>
		                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></button>
		                </th>
		                <th><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i></button></th>
                </tr>

            </table>
        </center>  
            <br>  
            <center>
                <table class="table  table-bordered table-hover table-sm " style="width:90%">
                        <caption><small>Lista de Tramos</small></caption>  
                        <thead>
                            <tr class="bg-danger">
                                <th scope="col" style="width:10%"  class="text-light letra">#</th>
                                <th scope="col" style="width:15%" class="text-light letra">Nombre</th>
                                <th scope="col" style="width:15%" class="text-light letra">Inicia</th>
                                <th scope="col" style="width:15%" class="text-light letra">Fin</th>
                                <th scope="col" style="width:15%" class="text-light letra">pedido</th>
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
                                <td><?php echo $arreglo[3] ?></td>
                                <td><?php echo $arreglo[4] ?></td>   

                                <td class="letra">
                                    <a href="clientesModificar.php">
                                    <button name="Guarda" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a> 
                                </td>
                                <td class="letra">
                                <a href="clientesEliminar.php">
                                    <button name="Guarda" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </a> 
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            }while($arreglo = mysqli_fetch_row($resultado));
                        ?>
                </table>            
	        </center>
         </form>
    </body> 
</html>