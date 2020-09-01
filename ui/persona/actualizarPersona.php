<?php
$processed=false;
$idPersona = $_GET['idPersona'];
$actPersona = new Personas($idPersona);
$actPersona -> select();
$nombre="";
if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
    $apellido=$_POST['apellido'];
}
$correo="";
if(isset($_POST['correo'])){
    $correo=$_POST['correo'];
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

if(isset($_POST['update'])){
    $actuPersona = new Personas($idPersona, $nombre, $apellido, "", $telefono, $cedula, $correo, "", $tarjetaCredito);
    $actuPersona -> editarPersona($cedula);
    $actuPersona -> update();
    $actuPersona -> select();
   
    $processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Editar Administrador</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Administrador editado exitosamente.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/persona/actualizarPersona.php") . "&idPersona=" . $idPersona ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $actPersona -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido(s)*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $actPersona -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo" value="<?php echo $actPersona -> getCorreo() ?>"  required />
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $actPersona -> getTelefono() ?>"/>
						</div>
						<div class="form-group">
							<label>Cedula</label>
							<input type="text" class="form-control" name="cedula" value="<?php echo $actPersona -> getCedula() ?>"/>
						</div>
						<div class="form-group">
							<label>Tarjeta de Credito</label>
							<input type="text" class="form-control" name="tarjetaCredito" value="<?php echo $actPersona -> getTarjetaCredito() ?>"/>
						</div>
						<button type="submit" class="btn btn-info" name="update">Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
