<?php
// Modelo:  visita.  Una visita tiene dos posibles métodos grabe y liste.

function grabe($post)
{
	$file = fopen('visitas.txt', 'a+');

	if (fputs($file, $post['nombre']."\n".$post['correo']."\n".str_replace("\r\n", '', nl2br($post['comentario']))."\n".date('d-m-Y')."\n") > 0)
	{
		fclose($file);
		return true;
	}
	else
	{
		fclose($file);
		return false;
	}
}

function add($post)
{
	$file = fopen('visitas.txt', 'a+');
	if( fputs($file, $post['nombre']."\n".$post['apellido']."\n".$post['telcasa']."\n".$post['dircasa']."\n".$post['teltrabajo']."\n".$post['dirtrabajo']."\n".$post['correo']."\n") > 0)
	{
		fclose($file);
		return true;
	}
	else
	{
		fclose($file);
		return false;
	}
}

function liste() {
	$file = fopen('visitas.txt', 'r');

	$visitas = array();
	while(($nombre = fgets($file)) && !feof($file))
	{
		$correo = fgets($file);
		$comentario = fgets($file);
		$fecha = fgets($file);
		$visita = array('correo' => $correo, 'nombre' => $nombre, 'fecha' => $fecha, 'comentario' => $comentario);
		array_push($visitas, $visita);
	} // while

	fclose($file);
	return $visitas;
}

// Controlador:

class VisitasController extends Solsoft\ekeke\Controller {
	function index()
	{
	}

	function ver()
	{
		$visitas = liste();
		$this->view->assign('visitas', $visitas);
	}

	function grabar()
	{
		if (grabe($_POST))
		{
			$this->view->assign('mensaje', 'Su comentario ha sido recibido satisfactoriamente.');
		}
		else
		{
			$this->view->assign('mensaje', 'Su comentario no se pudo guardar.');
		}
	}
	
	function agregar()
	{
		if (count($_POST)) {
			add($_POST);
			header('Location: index.php');
			die();
		}
	}
}

?>