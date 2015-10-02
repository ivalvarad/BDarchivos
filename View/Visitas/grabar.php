<html>
<head>
	<title>Libro de visitas, bienvenido</title>
</head>
<body>
<h1>Libro de Visitas</h1>
<p><?php echo $mensaje; ?><br />
   <?php echo $datos[0][1]; ?><br />
   <?php echo $datos[1][1]; ?><br />
<a href="<?php echo $_SERVER['PHP_SELF']; ?>">Enviar un nuevo comentario.</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=ver">Ver los comentarios de los visitantes anteriores.</a></p>
</body>
</html>