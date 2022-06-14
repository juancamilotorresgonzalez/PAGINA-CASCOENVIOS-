<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>SeguridadMotera</title>
</head>
<body>
<center>
    <form action="" name="documentos" method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Inicio</th>
                    <th>Acerca de</th>
                    <th>Contacto</th>
                    <th>Blog</th>
                </tr>
                <tr>
                    <th><input type="search" name="">Que te gustaria comprar</th>
                </tr>
            </thead>
            <?php
            do{
            ?>
                <tbody>
    
                        </tbody>
                    <?php
                        }while($arreglo = mysqli_fetch_row($resultado));
                    ?>       
                </table>
            </form>

</body>
</html>
