<?php 

    $link = mysqli_connect("localhost", "root", "", "sesiones");

    if (mysqli_connect_errno()){
        echo "No se pudo conectar : " . mysqli_connect_error();
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $query = "DELETE FROM usuarios WHERE id_usuario = " . $_POST["id"] . ";";
        mysqli_query($link, $query);
        

    }

    $query = "SELECT * FROM usuarios";
    $result = mysqli_query($link, $query);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>

    <a class="link-primary mt-2 ml-2 text-uppercase" href="formulario.html">Volver</a>

    <div class="container">

    <table class="table table-dark text-center">

    <thead>

        <tr>

            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Usuario</th>
            <th>Borrar usuario</th>

        </tr>

    </thead>

    <tbody>

    <?php while($row = mysqli_fetch_assoc($result)) : ?>

        <tr>

            <td><?php echo $row["nombres"] ?></td>
            <td><?php echo $row["apellidos"] ?></td>
            <td><?php echo $row["edad"] ?></td>
            <td><?php echo $row["usuario"] ?></td>
            <td>

            <form method="POST">  

                <input type="hidden" name="id" value="<?php echo $row['id_usuario']; ?>">    

                <input type="submit" class="btn btn-danger col-12" value="Eliminar">

            </form>

            </td>

        </tr>

    <?php endwhile; ?>

    </tbody>

    </table>

    </div>
    
    <script src="./js/bootstrap.min.js"></script>

</body>
</html>