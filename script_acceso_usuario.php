<?php 
//Proceso de conexion con la base de datos
$link = mysqli_connect("localhost", "root", "", "sesiones");

if (mysqli_connect_errno()){
    echo "No se pudo conectar : " . mysqli_connect_error();
    exit;
}
//Inicio de variables de sesi�n
if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

//Consultar si los datos son est�n guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='".$contrasena."'"; 
$resultado= mysqli_query($link,$consulta) ;

$fila=mysqli_fetch_array($resultado);


if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password incorrectos, por favor verifique.")
	self.location = "formulario.html"
	</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesi�n y redirigimos a la pagina de usuario
	$_SESSION['id_usuario'] = $fila['id_usuario'];
	$_SESSION['nombres'] = $fila['nombres'];

	header("Location: pagina_usuario.php");
}
?>