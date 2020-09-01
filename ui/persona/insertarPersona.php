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


<div class="container p-5">
	<h4 class="card-header border-info bg-transparent card-title">Crear Administrator</h4>
	<p><small class="text-info">Campos obligatorios (*)</small></p>
		<?php if($processed){ ?>
			<div class="alert alert-success" >Administrador creado exitosamente.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
				<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/persona/insertarPersona.php") ?>" class="bootstrap-form needs-validation"   >
					<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Apellidos*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" required />
						</div>
						<div class="form-group">
							<label>Edad*</label>
							<input type="text" class="form-control" name="edad" value="<?php echo $edad ?>" required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo" value="<?php echo $correo ?>"  required />
						</div>
						
					</div>
					<div class="col-md">
						<div class="form-group">
							<label>Contraseña*</label>
							<input type="password" class="form-control" name="contraseña" value="<?php echo $clave ?>" required />
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $telefono ?>"/>
						</div>
						<div class="form-group">
							<label>Cedula*</label>
							<input type="text" class="form-control" name="cedula" value="<?php echo $cedula ?>"/>
						</div>
						<div class="form-group">
							<label>Tarjeta de Credito*</label>
							<input type="text" class="form-control" name="tarjetaCredito" value="<?php echo $tarjetaCredito ?>"/>
						</div>
					</div>
					</div>
					<hr>
				<button type="submit" class="btn btn-outline-info btn-block" name="insert">Crear</button>
				</form>
</div>
