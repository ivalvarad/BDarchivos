<html>
	<head>
		<title>Libreta de direcciones, bienvenido.</title>
	</head>
	<body>
		<tr>
			<th><?php echo 'Nombre'; ?>&nbsp;</th>
			<th><?php echo 'Apellido'; ?>&nbsp;</th>
			<th><?php echo 'TelCasa';?>&nbsp;</th>
			<th><?php echo 'DirCasa';?>&nbsp;</th>
			<th><?php echo 'TelTrabajo';?>&nbsp;</th>
			<th><?php echo 'DirTrabajo';?>&nbsp;</th>
			<th><?php echo 'Correo';?>&nbsp;</th>
			<th><?php 'Actions';?></th>
		</tr>
		<?php echo "</br></br>"; ?>
		<?php
		foreach ($datos as $dato){
		?>
		    <tr>
				<td><?php echo $dato[2]; ?>&nbsp;</td>
				<td><?php echo $dato[3]; ?>&nbsp;</td>
				<td><?php echo $dato[4]; ?>&nbsp;</td>
				<td><?php echo $dato[5]; ?>&nbsp;</td>
				<td><?php echo $dato[6]; ?>&nbsp;</td>
				<td><?php echo $dato[7]; ?>&nbsp;</td>
				<td><?php echo $dato[8]; ?>&nbsp;</td>
				<td>
				    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=editar">Editar</a>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=eliminar">Eliminar</a>
				</td>
				</br></br>
			</tr>
		<?php
		}
		?>
	</body>
</html>