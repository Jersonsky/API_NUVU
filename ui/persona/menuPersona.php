<?php
$persona = new Personas($_SESSION['id']);
$persona -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mb-3" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/persona/sesionPersonas.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Crear</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/persona/insertarPersona.php") ?>">Persona</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Consultar</a>
				<div class="dropdown-menu">
					
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/persona/consultarPersonas.php") ?>">Todas las personas</a>
    				<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/persona/consultarPersona.php") ?>">Una persona</a>
					
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Editar</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/persona/editarPersona.php") ?>">Persona</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Cerrar Sesi&oacute;n</a>
			</li>
		</ul>
	</div>
</nav>
