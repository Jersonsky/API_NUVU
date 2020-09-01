
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Lista de Personas</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						
						</th>
						<th nowrap>Apellidos
						
						</th>
						<th nowrap>Edad 
						
						</th>
						<th nowrap>Telefono 
						
						</th>
						<th nowrap>Cedula
						
						</th>
						<th nowrap>Correo 
						
						</th>
						<th nowrap>Tarjeta de Credito 
						
						</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$persona = new Personas();
					$personas = $persona-> selectAll();
					$counter = 1;
					foreach ($personas as $per) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $per -> getNombre() . "</td>";
						echo "<td>" . $per -> getApellido() . "</td>";
						echo "<td>" . $per -> getEdad() . "</td>";
						echo "<td>" . $per -> getTelefono() . "</td>";
						echo "<td>" . $per -> getCedula() . "</td>";
						echo "<td>" . $per -> getCorreo() . "</td>";
						echo "<td>" . $per -> getTarjetaCredito() . "</td>";
						echo "<td class='text-right' nowrap>";
							echo "<a href='index.php?pid=" . base64_encode("ui/persona/actualizarPersona.php") . "&idPersona=" . $per -> getId() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Persona' ></span></a> ";
						echo "</td>";
						echo "</tr>";
						$counter++;
					}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

