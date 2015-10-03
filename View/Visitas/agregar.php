<?php
header ('Content-type: text/html; charset=utf-8');
?>
<html>
	<head>
		<title>Libreta de direcciones</title>
	</head>
	<body>
		<h1>Agregar nuevo contacto.</h1>
		<form name="visita" id="visita" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		  <input name="action" type="hidden" value="agregar" />
			  <p>Nombre:<input name="nombre" type="text" id="nombre" size="51" maxlength="50" /></p>
			  <p>Apellido:<input name="apellido" type="text" id="apellido" size="51" maxlength="50" /></p>
			  <p>Tel&eacute;fono de casa:<input name="telcasa" type="text" id="telcasa" size="51" maxlength="10" /></p>
			  <p>Direcci&oacute;n de la casa:<textarea name="dircasa" cols="50" rows="3" wrap="VIRTUAL" id="dircasa"></textarea></p>
			  <p>Tel&eacute;fono del trabajo:<input name="teltrabajo" type="text" id="teltrabajo" size="51" maxlength="10" /></p>
			  <p>Direcci&oacute;n del trabajo:<textarea name="dirtrabajo" cols="50" rows="3" wrap="VIRTUAL" id="dirtrabajo"></textarea></p>
			  <p>Correo electr&oacute;nico:<input name="correo" type="text" id="correo" size="51" maxlength="50" /></p>
			  <p><input name="Enviar" type="submit" id="Enviar" value="Enviar" /></p>
		</form>
	</body>
</html>
