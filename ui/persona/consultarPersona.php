
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Persona</h4>
		</div>
		<div class="card-body">
		<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/persona/consultarPersona.php") ?>" class="bootstrap-form needs-validation"   >
					<div class="container">
					<p>Por favor digite la cedula de la persona que quiere consultar</p>
						<div class="form-group">
							<label>Cedula*</label>
							<input type="text" class="form-control" name="cedula" required />
						</div>
						
					</div>
					<hr>
				<button type="submit" class="btn btn-outline-info btn-block" name="consultar">Crear</button>
				</form>
			
		</div>
	</div>
</div>

<?php
if(isset($_POST['consultar'])){
    $persona = new Personas();
    $persona -> consultaPersona($_POST['cedula']);
}

?>