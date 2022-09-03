<table border='1'>
<?php echo getcwd() ?>
	<h1> PRODUCTOS</h1>
	<tr>
		<td>Id_producto</td>
		<td>modelo</td>
		<td>especificaciones</td>
		<td>precio</td>
		<td>id_clasificacion</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($producto as $producto) { ?>
		
			<tr>
				<td><?php echo $producto->id_producto; ?></td>
				<td><?php echo $producto->modelo; ?></td>
				<td><?php echo $producto->especificaciones;?></td>
				<td><?php echo $producto->precio;?></td>
				<td><?php echo $producto->id_clasificacion;?></td>
			</tr>		
	<?php } ?>
</table>