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

//primero lee el contador de la línea inicial del archivo
//ingresa ese contador seguido de todas las entradas que ya se ingresan
//aumenta el contador y lo escribe en la primera línea del archivo
//el archivo de BD inicial debe contener dos líneas, el contador en la primera y delimitador en la segunda.
/*
   0
   /
*/
function add($post){
	$file = fopen('visitas.txt', 'a+');
	$fileStr = fread($file,filesize("visitas.txt"));
	$cont = trim(strtok($fileStr, "\n"));
	if( fputs($file, PHP_EOL.$cont.PHP_EOL.$post['nombre'].PHP_EOL.$post['apellido'].PHP_EOL.$post['telcasa'].PHP_EOL.$post['dircasa'].PHP_EOL.$post['teltrabajo'].PHP_EOL.$post['dirtrabajo'].PHP_EOL.$post['correo'].PHP_EOL."/") > 0)
	{
	    $file_data = ($cont+1);
		$fileStr = file_get_contents("visitas.txt");
		$file_data .= substr($fileStr, stripos($fileStr,PHP_EOL));
		file_put_contents('visitas.txt', $file_data);
		fclose($file);
		return true;
	}
	else
	{
		fclose($file);
		return false;
	}
}

function parfile(){
	$datos = array();
	$in = fopen('visitas.txt', 'a+');
	$inStr = fread($in,filesize("visitas.txt"));
	fclose($in);
	$inArr = explode("/",$inStr);
	for($i=1; $i<sizeof($inArr); ++$i){
		$str = $inArr[$i]; //un contacto
		$entryArr = explode("\n",$str);
		array_push($datos,$entryArr);
	}
	unset($datos[sizeof($datos)-1]);
	return $datos;
}


function delete($post){
    $in = fopen('visitas.txt', 'a+');
	$inStr = fread($in,filesize("visitas.txt"));
	fclose($in);
	$inArr = explode("/",$inStr);
	for($i=1; $i<sizeof($inArr); ++$i){
	    $str = $inArr[$i]; //un contacto
		$entryArr = explode("\n",$str);
		//printf($entryArr[1].".");
		if(strcmp(trim($entryArr[1]), strval($post))==0){
			unset($inArr[$i]);
		}
	}
	$newCont = implode("/",$inArr);
	$in = fopen('visitas.txt', 'w');
	fwrite($in, $newCont);
	fclose($in);
}

function edit($post){
    $in = fopen('visitas.txt', 'a+');
	$inStr = fread($in,filesize("visitas.txt"));
	fclose($in);
	$inArr = explode("/",$inStr);
	for($i=1; $i<sizeof($inArr); ++$i){
	    $str = $inArr[$i]; //un contacto
		$entryArr = explode("\n",$str);
		printf($entryArr[1].".");
		if(strcmp(trim($entryArr[1]), strval($post['idUser']))==0){
		
			//$inArr[$i] = "HOLASDF"; //poner datos entrantes
			$entryArr[2] = $_POST['nombre'];
			$entryArr[3] = $_POST['apellido'];
			$entryArr[4] = $_POST['telcasa'];
			$entryArr[5] = $_POST['dircasa'];
			$entryArr[6] = $_POST['teltrabajo'];
			$entryArr[7] = $_POST['dirtrabajo'];
			$entryArr[8] = $_POST['correo'];
			$cambio = implode("\n",$entryArr);
			$inArr[$i] = $cambio;
			
			
		
		}
	}
	$newCont = implode("/",$inArr);
	$in = fopen('visitas.txt', 'w');
	fwrite($in, $newCont);
	fclose($in);
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
	$this->view->assign('datos', parfile());
	}

	function ver()
	{
		$visitas = liste();
		$this->view->assign('visitas', $visitas);
		$this->view->assign('datos', parfile());
	}

	function grabar()
	{
		if (grabe($_POST))
		{
			$this->view->assign('mensaje', 'Su comentario ha sido recibido satisfactoriamente.');
			//$this->view->assign('datos', parfile());
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
		echo $_POST['idUser'];
		delete($_POST['idUser']);
		$this->view->assign('mensaje', 'Fue borrado exitosamente');
	}
	
	function editar()
	{
		
		

		
	}	
	function editarS()
	{
		
		edit($_POST);
		$this->view->assign('mensaje', 'Fue editado exitosamente');
		
	}
}

?>
