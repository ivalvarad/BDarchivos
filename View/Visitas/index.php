<html>
	<head>
		<title>Libreta de direcciones</title>
		<style>
			table, th, td, tr {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
	    <h1>Bienvenido a su libreta de direcciones</h1>
	    <table>
			<tr>
				<th><?php echo 'Nombre'; ?>&nbsp;</th>
				<th><?php echo 'Apellido'; ?>&nbsp;</th>
				<th><?php echo 'TelCasa';?>&nbsp;</th>
				<th><?php echo 'DirCasa';?>&nbsp;</th>
				<th><?php echo 'TelTrabajo';?>&nbsp;</th>
				<th><?php echo 'DirTrabajo';?>&nbsp;</th>
				<th><?php echo 'Correo';?>&nbsp;</th>
				<th><?php echo 'Actions';?></th>
			</tr>
			<?php echo "</br></br>"; ?>
			<?php
			foreach ($datos as $dato){
			?>
			
			<tr class="desp">
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
			</tr>
		<?php
		}
		?>
		</table>
		<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=agregar">Agregar una nueva entrada.</a></p>
	</body>
</html>