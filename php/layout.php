<html>
<head>
	<title>Bienvenido MVC </title>
</head>
<body>
	<table border='1'>
		<tr>			
			<td><a href="?controller=producto&action=register">Ingresar Productos</a></td>
			<td><a href="?controller=producto&action=indexproducto">Ver Productos</a></td>
		</tr>
	</table>
	<?php require_once('routes.php'); ?>
</body>
</html>