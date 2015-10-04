<?php
header ('Content-type: text/html; charset=utf-8');
?>
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
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=editar" method="post">
			<tr class="desp">
				<td><?php echo $dato[2]; ?>&nbsp;</td>
				<td><?php echo $dato[3]; ?>&nbsp;</td>
				<td><?php echo $dato[4]; ?>&nbsp;</td>
				<td><?php echo $dato[5]; ?>&nbsp;</td>
				<td><?php echo $dato[6]; ?>&nbsp;</td>
				<td><?php echo $dato[7]; ?>&nbsp;</td>
				<td><?php echo $dato[8]; ?>&nbsp;</td>
				<td>
				<input type="hidden" name="idUser" value="<?php echo $dato[1] ?>" > 
				<input type="hidden" name="idNom" value="<?php echo $dato[2] ?>" > 
				<input type="hidden" name="idApellido" value="<?php echo $dato[3] ?>" > 
				<input type="hidden" name="idTelCasa" value="<?php echo $dato[4] ?>" > 
				<input type="hidden" name="idDirCasa" value="<?php echo $dato[5] ?>" > 
				<input type="hidden" name="idTelTrab" value="<?php echo $dato[6] ?>" >
				<input type="hidden" name="idDirTrab" value="<?php echo $dato[7] ?>" > 
				<input type="hidden" name="idCorreo" value="<?php echo $dato[8] ?>" >  
				<input type="submit" value="Editar">
			</form>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=eliminar" method="post">
				
				<input type="hidden" name="idUser" value="<?php echo $dato[1] ?>" > 
				    <input type="submit" value="Eliminar">
				    
				</form>
				
				</td>
			</tr>
		<?php
		}
		?>
		</table>
		<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=agregar">Agregar una nueva entrada.</a></p>
		<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=ver">Ver</a></p>
	</body>
</html>

