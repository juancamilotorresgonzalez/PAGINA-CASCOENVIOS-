<?php
include('../conexion/conexion.php');
?>
<?php
if ($_POST) {
    $obj->documentoCliente = $_POST['documentoCliente'];
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"];
$maximoDatos = 5;
$paginaNumero = 0;

if (isset($_GET['paginaNumero'])) {
    $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php
if (isset($_POST['consulta'])) {
    // echo "<script>alert('llegue')</script>";
    $clas = new Conexion();
    $conecta = $clas->conectar_al_servidor();
    $query = "select * from clientes where documentoCliente like
        '%$obj->documentoCliente%' ";
    $limite = sprintf("%s limit %d, %d", $query, $inicia, $maximoDatos);
    $resultado = mysqli_query($conecta, $limite);
    $arreglo = mysqli_fetch_row($resultado);
} else {
    $clas = new Conexion();
    $conecta = $clas->conectar_al_servidor();
    $query = "select * from clientes";
    $limite = sprintf("%s limit %d, %d", $query, $inicia, $maximoDatos);
    $resultado = mysqli_query($conecta, $limite);
    $arreglo = mysqli_fetch_row($resultado);
}
?>
<?php
if (isset($_GET['totalArreglo'])) {
    $totalArreglo = $_GET['totalArreglo'];
} else {
    $lista = mysqli_query($conecta, $query);
    $totalArreglo = mysqli_num_rows($lista);
}
$totalPagina = ceil($totalArreglo / $maximoDatos) - 1;

?>
<?php
$cargarPagina = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $parametro1 = explode("&", $_SERVER['QUERY_STRING']);
    $nuevoParametro = array();
    foreach ($parametro1 as $parametro2) {
        if (stristr($parametro2, "paginaNumero") == false && stristr($parametro2, "totalArreglo") == false) {
            array_push($nuevoParametro, $parametro2);
        }
    }
    if (count($nuevoParametro) != 0) {
        $cargarPagina = "&" . htmlentities(implode("&", $nuevoParametro));
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
    <title>Clientes</title>
    <link rel="stylesheet" href="../CSS/eestilos_php.css">

</head>

<body>

    <header>
        <section class="body_estilo">

            <h2>Clientes</h2>
            <form action="" name="clientes" method="POST">
                <table width="500">
                    <tr>
                        <td>
                            <a href="agregarCliente.php">
                                <button type="button" name="agregar" value="Agregar">Agregar</button>
                            </a>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <input type="text" name="documentoCliente" id="documentoCliente" placeholder="Digite el Numero del Documento del Cliente" size="50">
                        </td>
                        <td>
                            <button type="submit" name="consulta" value="consulta">Buscar</button>
                        </td>
                        <td>
                            <button type="submit" name="refrescar" value="refrescar">Listar</button>
                        </td>
                        <td>
                            <a href="../index.html">
                                <button type="button" name="salir" value="salir">Salir</button>
                            </a>
                        </td>
                    </tr>

                </table>
                <br>
                <hr>
                <br>
                <table border="1" width="1000">

                    <thead>
                        <tr>
                        

                            
                            <td>
                                <center>Numero de Documento</center>
                            </td>
                            <td>
                                <center>Tipo de Documento</center>
                            </td>
                            <td>
                                <center>Nombre</center>
                            </td>
                            <td>
                                <center>Apellido</center>
                            </td>
                            <td>
                                <center>Telefono</center>
                            </td>
                            <td>
                                <center>Correo</center>
                            </td>
                            <td>
                                <center>Contraseña</center>
                            </td>
                            <td>
                                <center>Ciudad</center>
                            </td>
                            <td>
                                <center>Modificar</center>
                            </td>
                            <td>
                                <center>Eliminar</center>
                            </td>
                        </tr>
                    </thead>
                    <?php
                    if ($arreglo > 0) {

                        do {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arreglo[0]; ?></td>
                                    <td>
                                        <?php
                                        $clas = new Conexion();
                                        $conecta = $clas->conectar_al_servidor();
                                        $query1 = "SELECT numeroDocumento from documentos where codigoDocumento ='$arreglo[1]'";
                                        $res = mysqli_query($conecta, $query1);
                                        $a = mysqli_fetch_array($res);
                                        echo $a[0]
                                        ?>
                                    </td>
                                    <td><?php echo $arreglo[2]; ?></td>
                                    <td><?php echo $arreglo[3]; ?></td>
                                    <td><?php echo $arreglo[4]; ?></td>
                                    <td><?php echo $arreglo[5]; ?></td>
                                    <td><?php echo $arreglo[6]; ?></td>
                                    <td><?php echo $arreglo[7]; ?></td>
                                    <td>
                                        <a href="<?php if ($arreglo[0] <> "") {
                                                        echo "modificarCliente.php?key=" . urlencode($arreglo[0]);
                                                    } ?>">
                                            <button type="button" name="modificar" value="modificar">Modificar
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php if ($arreglo[0] <> "") {
                                                        echo "eliminarCliente.php?key=" . urlencode($arreglo[0]);
                                                    } ?>">
                                            <button type="button" name="eliminar" value="eliminar">Eliminar
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                    <?php
                        } while ($arreglo = mysqli_fetch_row($resultado));
                    } else {
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
                            if ($paginaNumero > 0) {
                            ?>
                                <a href="<?php printf("%s?paginaNumero=%d%s", $correrPagina, 0, $cargarPagina) ?>" id="paginador">
                                    < Inicio </a> <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($paginaNumero > 0) {
                            ?>
                                <a href="<?php printf("%s?paginaNumero=%d%s", $correrPagina, max(0, $paginaNumero - 1), $cargarPagina) ?>" id="paginador">
                                    << Anterior </a> <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($paginaNumero < $totalPagina) {
                            ?>
                                <a href="<?php printf("%s?paginaNumero=%d%s", $correrPagina, min($totalPagina, $paginaNumero + 1), $cargarPagina) ?>" id="paginador"> Siguiente >> </a> <?php } ?>
                        </td>
                        <td>
                            <?php
                            if ($paginaNumero < $totalPagina) {
                            ?>
                                <a href="<?php printf("%s?paginaNumero=%d%s", $correrPagina, $totalPagina, $cargarPagina) ?>" id="paginador"> Ultima ></a> <?php } ?>
                        </td>

                    </tr>
                </table>


                </center>
            </form>

        </section>
    </header>
</body>

</html>