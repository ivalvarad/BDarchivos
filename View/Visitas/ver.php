<html>
<head>
	<title>Libro de visitas, bienvenido</title>
</head>
<body>
<h1>Libro de Visitas</h1>
<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Enviar un nuevo comentario.</a></p>
<?php
foreach ($visitas as $visita)
{
?>
	<p><em>Comentario enviado por <a href="mailto:<?php echo $visita['correo']; ?>"><?php echo $visita['nombre']; ?></a>.</em><br />
	Fecha: <?php echo $visita['fecha']; ?><br />
	<q><?php echo $visita['comentario']; ?></q></p>
<?php
}
?>
<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Enviar un nuevo comentario.</a></p>
</body>
</html>