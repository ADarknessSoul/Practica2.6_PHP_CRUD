<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $link = mysqli_connect("localhost", "root", "", "sesiones");
    
    if (mysqli_connect_errno()){
        echo "No se pudo conectar : " . mysqli_connect_error();
        exit;
    }

    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Edad = $_POST['Edad'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];

    $Errores = [];

    if(empty($Nombres)) array_push($Errores, "Debes agregar un nombre");
    if(empty($Apellidos)) array_push($Errores, "Debes agregar un apellido");
    if(empty($Edad)) array_push($Errores, "Debes agregar una edad");
    if(empty($Usuario)) array_push($Errores, "Debes agregar un usuario");
    if(empty($Contraseña)) array_push($Errores, "Debes agregar una contraseña");

    $Busqueda = "SELECT usuario FROM usuarios WHERE usuario = '" . $Usuario . "';";
    $resultado = mysqli_query($link, $Busqueda);

    $row = mysqli_fetch_assoc($resultado);

    if(empty($Errores) && empty($row)) {

        $Consulta = "INSERT INTO usuarios (nombres, apellidos, edad, usuario, contrasena) VALUES ('" . $Nombres . "', '" . $Apellidos . "', '" . $Edad . "', '" . $Usuario . "', '" . $Contraseña . "');";
        mysqli_query($link, $Consulta);
        header("Location: formulario.html");
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
    
    <div class="text-center mt-3">

        <a class="link-primary text-uppercase" href="formulario.html">Volver</a>

    </div>

    <form class="container mt-3" method="POST">

        <fieldset>

            <legend class="text-center">Crear usuario</legend>

            <label for="Nombres">Nombres</label>
            <input class="form-control" name="Nombres" id="Nombres" type="text">

            <label id="Apellidos" for="Apellidos">Apellidos</label>
            <input class="form-control" name="Apellidos" id="Apellidos" type="text">

            <label for="Edad">Edad</label>
            <input class="form-control" id="Edad" name="Edad" type="number" min="3">

            <label for="Usuario">Usuario</label>
            <input class="form-control" id="Usuario" name="Usuario" type="text">

            <label for="Contraseña">Contraseña</label>
            <input type="password" id="Contraseña" name="Contraseña" class="form-control">

        </fieldset>

        <button type="submit" class="btn btn-outline-primary col-12 mt-3">Enviar</button>

    </form>

    <script src="./js/bootstrap.min.js"></script>

</body>
</html>