<?php 
session_start();

if ($_SESSION['nombres'])
{	
	session_destroy();
	echo '<script language = javascript>
	alert("su sesion ha terminado correctamente")
	self.location = "formulario.html"
	</script>';}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesi�n, por favor reg�strese")
	self.location = "formulario.html"
	</script>';}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Documento sin t&iacute;tulo</title>
</head>
<body>
	
</body>
</html>
