<?php
    include 'conexion.php';  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cascosenviospost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
     


<nav class="navbar navbar-dark bg-dark">

        <div class="container">
            <a href="index.php" class="navbar-brand">Pide lo que nesecitas de Una!</a>
        </div>

            <div class="container p-4">

                <div class="row">

                        <div class="col md-4">

                            <div class="card card-body">
                                    <form action="agregar.php" method="$_POST">

                                            <div class="form group">
                                                    <input type="text" name="title" class="form-control" placeholder="escribe titulo" autofocus>
                                            </div>
                                            <div class="form group">
                                                    <textarea name="descripcion" rows="2" class="form-control" placeholder="escribe descripcion" ></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-sucess btn-block" name="guardar datos" value="guardar datos" >
                                    </form>

                        </div>
                    </div>

                <div class="col md-8">

            </div>

        </div>
    </div>

</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>













</body>

</html>