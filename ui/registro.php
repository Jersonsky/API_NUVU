<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
    $apellido=$_POST['apellido'];
}
$edad="";
if(isset($_POST['edad'])){
    $edad=$_POST['edad'];
}
$correo="";
if(isset($_POST['correo'])){
    $correo=$_POST['correo'];
}
$clave="";
if(isset($_POST['clave'])){
    $clave=$_POST['clave'];
}
$telefono="";
if(isset($_POST['telefono'])){
    $telefono=$_POST['telefono'];
}
$cedula="";
if(isset($_POST['cedula'])){
    $cedula=$_POST['cedula'];
}
$tarjetaCredito="";
if(isset($_POST['tarjetaCredito'])){
    $tarjetaCredito=$_POST['tarjetaCredito'];
}
if(isset($_POST['insert'])){
    $nuevaPersona = new Personas("", $nombre, $apellido, $edad, $telefono, $cedula, $correo, $clave, $tarjetaCredito);
    $nuevaPersona -> registroPersona();
    $nuevaPersona -> insert();
    
    $processed=true;
}
?>


<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mb-3" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/LogIn.php") ?>"><span class="fas fa-arrow-left" aria-hidden="true"></span></a>
	
</nav>

<div class="container p-5">
	<h4 class="card-header border-info bg-transparent card-title">Registro</h4>
	<p><small class="text-info">Campos obligatorios (*)</small></p>
		<?php if($processed){ ?>
			<div class="alert alert-success" >Se ha registrado exitosamente.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
				<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/registro.php") ?>" class="bootstrap-form needs-validation"   >
					<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre"  required />
						</div>
						<div class="form-group">
							<label>Apellidos*</label>
							<input type="text" class="form-control" name="apellido"  required />
						</div>
						<div class="form-group">
							<label>Edad*</label>
							<input type="text" class="form-control" name="edad"  required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo"   required />
						</div>
						
					</div>
					<div class="col-md">
						<div class="form-group">
							<label>Contrase&ntilde;a*</label>
							<input type="password" class="form-control" name="contraseña"  required />
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" />
						</div>
						<div class="form-group">
							<label>Cedula*</label>
							<input type="text" class="form-control" name="cedula" />
						</div>
						<div class="form-group">
							<label>Tarjeta de Credito*</label>
							<input type="text" class="form-control" name="tarjetaCredito" />
						</div>
					</div>
					</div>
					<hr>
				<button type="submit" class="btn btn-outline-info btn-block" name="insert">Crear</button>
				</form>
</div>
