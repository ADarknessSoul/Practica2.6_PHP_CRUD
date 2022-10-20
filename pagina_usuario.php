  <?php
//Proceso de conexi�n con la base de datos
$link = mysqli_connect("localhost", "root", "", "sesiones");

if (mysqli_connect_errno()){
    echo "No se pudo conectar : " . mysqli_connect_error();
    exit;
}

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

//Validar si se est� ingresando con sesi�n correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "formulario.html"
</script>';
}

$id_usuario = $_SESSION['id_usuario'];

$consulta= "SELECT * FROM usuarios WHERE id_usuario=".$id_usuario.""; 

$result= mysqli_query($link,$consulta); 

if  (!$result){
      echo "Error en la consulta : " . mysqli_error($link);
}

$fila = mysqli_fetch_assoc($result);

$nombres = $fila['nombres'];
$usuario = $fila['usuario'];
$apellidos = $fila['apellidos'];
$edad = $fila['edad'];
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina de Usuario</title>

  <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
  
<table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">Usuario: <span class="Estilo6"><strong><?php echo $usuario ?></strong></span></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><a href="desconectar_usuario.php">Cerrar Sesi&oacute;n</a> </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><h3>P&Aacute;GINA DE USUARIO</h3></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <p>Su nombre es <?php echo $nombres; ?></p>
      <p>Su apellido es <?php echo $apellidos; ?></p>
      <p>Su edad es: <?php echo $edad; ?></p>
    </div></td>
  </tr>
</table>

<div class="text-center mt-3">

<a class="link-primary text-uppercase" href="ModificarUsuario.php?id=<?php echo $id_usuario ?>">Modificar usuario</a>

</div>


</body>
</html>