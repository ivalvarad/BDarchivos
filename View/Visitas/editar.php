<?php
header ('Content-type: text/html; charset=utf-8');
?>
<html>
	<head>
		<title>Libreta de direcciones</title>
	</head>
	<body>

		<h1>Editar un contacto.</h1>
		<?php //echo $_POST['idUser']; ?>
		<?php //echo $_POST['idCorreo']; ?>
		<form name="visita" id="visita" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=editarS">
		  <input type="hidden" name="idUser" id="idUser" value="<?php echo $_POST['idUser']; ?>" > 
			  <p>Nombre:
			<input name="nombre" type="text" id="nombre" size="51" maxlength="50" 
			value="<?php echo $_POST['idNom'] ?>"/>
			  </p>
			  <p>Apellido:
			<input name="apellido" type="text" id="apellido" size="51" maxlength="50" 
			value="<?php echo $_POST['idApellido'] ?>" />
			  </p>
			  <p>Telefono de casa:
			<input name="telcasa" type="text" id="telcasa" size="51" maxlength="10" 
			value="<?php echo $_POST['idTelCasa'] ?>" />
			  </p>
			  <p>Dirección de la casa:
				<input name="dircasa" type="text" id="dircasa" size="100" maxlength="10" 
				value="<?php echo $_POST['idDirCasa'] ?>" />
			  </p>
			  <p>Telefono del trabajo:
				<input name="teltrabajo" type="text" id="teltrabajo" size="51" maxlength="10" 
				value="<?php echo $_POST['idTelTrab'] ?>" />
			  </p>
			  <p>Direccion del trabajo:
				<input name="dirtrabajo" type="text" id="dirtrabajo" size="100" maxlength="10" 
				value="<?php echo $_POST['idDirTrab'] ?>" />
			  </p>
			  <p>Correo electr&oacute;nico:
				<input name="correo" type="text" id="correo" size="51" maxlength="50" 
				value="<?php echo $_POST['idCorreo'] ?>"/>
		      </p>
			  <p>
				<input name="Enviar" type="submit" id="Enviar" value="Guardar" />
			  </p>
		</form>
	</body>
</html>

