<?php
$persona = new Personas($_SESSION['id']);
$persona -> select();
?>
<div class="container">
	<div>
		<div class="card-header">
			<h3>Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				
				<div class="col-md-12">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $persona -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellidos</th>
								<td><?php echo $persona -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $persona -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $persona -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>Celular</th>
								<td><?php echo $persona -> getCedula() ?></td>
							</tr>
							<tr>
								<th>Tarjeta de Credito</th>
								<td><?php echo $persona -> getTarjetaCredito() ?></td>
							</tr>
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
