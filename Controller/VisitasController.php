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


function delete($post){
	$post = 0;
    $in = fopen('visitas.txt', 'a+');
	$inStr = fread($in,filesize("visitas.txt"));
	fclose($in);
	$inArr = explode("/",$inStr);
	for($i=1; $i<sizeof($inArr); ++$i){
	    $str = $inArr[$i]; //un contacto
		$entryArr = explode("\n",$str);
		printf($entryArr[1].".");
		if(strcmp(trim($entryArr[1]), "0")==0){
			$inArr[$i] = ""; //poner datos entrantes
		}
	}
	$newCont = implode("//",$inArr);
	$in = fopen('visitas.txt', 'w');
	fwrite($in, $newCont);
	fclose($in);
}

/*
function delete($post){
	$post = 0;
    $in = fopen('visitas.txt', 'a+');
	$inStr = fread($in,filesize("visitas.txt"));
	$index = strpos($inStr, "\n");
	$cont = substr($inStr,0,$index);
	$cont = trim($cont);
	//printf($cont.".");
	//$inStr = substr($inStr,1);
	$inStr = substr($inStr,$index-1);
	$inArr = explode("/",$inStr);
	fclose($in);
	foreach($inArr as $entry) {
		$entryArr = explode("\n",$entry);
		//if($entry[0]===$post){
			//$entry = "";
			//printf($entry."</br>");
		//}
	}
	$arrayCont = array($cont);
	$inArr = array_merge($arrayCont,$inArr);
	foreach($inArr as $entry) {
		printf($entry."</br>");
	}
	$newCont = implode("//",$inArr);
	$in = fopen('visitas.txt', 'w');
	fwrite($in, $newCont);
	fclose($in);
}*/

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
	
	function eliminar()
	{
		delete(1);
	}
}

?>