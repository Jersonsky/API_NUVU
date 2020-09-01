<?php

session_start();
require('logica/Personas.php');
//ini_set("display_errors","1");
//error_reporting(E_ERROR | E_WARNING | E_PARSE );
date_default_timezone_set("America/Bogota");
$paginasSinAutenticacion = array(
    'ui/LogIn.php',
    'ui/registro.php',
);
$paginasAutenticadas = array(
    'ui/persona/sesionPersonas.php',
    'ui/persona/insertarPersona.php',
    'ui/persona/consultarPersona.php',
    'ui/persona/consultarPersonas.php',
    'ui/persona/unaPersona.php',
    'ui/persona/editarPersona.php',
    'ui/persona/actualizarPersona.php',
);
if(isset($_GET['logOut'])){
    $_SESSION['id']="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>NUVU</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="estilos/estilo.css" />
		<link rel="icon" type="image/png" href="img/IconPag.png" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
		<script charset="utf-8">
			$(function () { 
				$("[data-toggle='tooltip']").tooltip(); 
			});
		</script>
	</head>
	<body>
		<div class="container p-0" style="background-color: white;">
		<?php
		if(empty($_GET['pid'])){
			include('ui/LogIn.php');
		}else{
			$pid=base64_decode($_GET['pid']);
			if(in_array($pid, $paginasSinAutenticacion)){
				include($pid);
			}else{
				if($_SESSION['id']==""){
					header("Location: index.php");
					die();
				}
				if($_SESSION['entity']=="Persona"){
					include('ui/persona/menuPersona.php');
				}
				if (in_array($pid, $paginasAutenticadas)){
					include($pid);
				}else{
					include('ui/error.php');
				}
			}
		}
		?>
		</div>
	</body>
</html>
