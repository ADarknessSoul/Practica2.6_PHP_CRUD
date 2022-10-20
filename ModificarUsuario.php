<?php

$link = mysqli_connect("localhost", "root", "", "sesiones");
    
if (mysqli_connect_errno()){
    echo "No se pudo conectar : " . mysqli_connect_error();
    exit;
}

$id_usuario = $_GET["id"];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Edad = $_POST['Edad'];
    $Usuario = $_POST['Usuario'];

    $Errores = [];

    if(empty($Nombres)) array_push($Errores, "Debes agregar un nombre");
    if(empty($Apellidos)) array_push($Errores, "Debes agregar un apellido");
    if(empty($Edad)) array_push($Errores, "Debes agregar una edad");
    if(empty($Usuario)) array_push($Errores, "Debes agregar un usuario");

    if(empty($Errores)) {

        $Consulta = "UPDATE usuarios SET nombres = '" . $Nombres . "', apellidos = '" . $Apellidos . "', edad = " . $Edad . ", usuario = '" . $Usuario . "' WHERE id_usuario = " . $id_usuario . ";";
        var_dump($Consulta);
        mysqli_query($link, $Consulta);
        header("Location: pagina_usuario.php");
    }

}

$Busqueda = "SELECT * FROM usuarios WHERE id_usuario = " . $id_usuario . ";";
$resultado = mysqli_query($link, $Busqueda);
$row = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
    
<div class="text-center mt-3">

<a class="link-primary text-uppercase" href="pagina_usuario.php">Volver</a>

</div>

<form class="container mt-3" method="POST">

<fieldset>

    <legend class="text-center">Modificar usuario</legend>

    <label for="Nombres">Nombres</label>
    <input class="form-control" name="Nombres" id="Nombres" type="text" value="<?php echo $row["nombres"] ?>">

    <label id="Apellidos" for="Apellidos">Apellidos</label>
    <input class="form-control" name="Apellidos" id="Apellidos" type="text" value="<?php echo $row["apellidos"] ?>">

    <label for="Edad">Edad</label>
    <input class="form-control" id="Edad" name="Edad" type="number" min="3" value="<?php echo $row["edad"] ?>">

    <label for="Usuario">Usuario</label>
    <input class="form-control" id="Usuario" name="Usuario" type="text" value="<?php echo $row["usuario"] ?>">

</fieldset>

<button type="submit" class="btn btn-outline-primary col-12 mt-3">Enviar</button>

</form>

<script src="./js/bootstrap.min.js"></script>

</body>
</html>