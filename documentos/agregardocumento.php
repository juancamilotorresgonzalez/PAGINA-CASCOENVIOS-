<?php
  include ('../conexion/conexion.php');
  include('../modelos/documentosModelos.php');
?>
<?php
    $clas = new Conexion();
    $conecta = $clas->conectar_al_servidor();
    $query="select * from documentos";
    $resultado=mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
?>
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Documentos</title>
</head>
<body>

<center>
    <form action="" name="codigodocumento" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Inicio</th>
                    <th>Acerca de</th>
                    <th>Contacto</th>
                    <th>Blog</th>
                </tr>
                <tr>
                    <th>Pide lo que necesitas de Una!</th>
                </tr>
                <tr>
                    <th>entra el curso</th>
                </tr>
            </thead>
            <?php
            do{
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $arreglo["Id"] ?></td>
                        <td><?php echo $arreglo["usuario"] ?></td>
                        <td><?php echo $arreglo["correo"] ?></td>
                        <td><?php echo $arreglo["Contraseña,"] ?></td>
                        <td><?php echo $arreglo["telefono"] ?></td>
                        <td><?php echo $arreglo["ciudad"] ?></td>
                        <td>
                            <a href="modificar.php?id=<?php echo $arreglo["Id"] ?>">Editar</a>
                            <a href="modificar.php?id=<?php echo $arreglo["Id"] ?>">Eliminar</a>
                        </td>
                    </tr>     
                        </tbody>
                    <?php
                        }while($arreglo = mysqli_fetch_row($resultado));
                    ?>       
                </table>
            </form>
        </center>
    </body>
</html>