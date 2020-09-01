<?php
$logInError=false;
if(isset($_POST['logIn'])){
    if(isset($_POST['correo']) && isset($_POST['clave'])){
        
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        $persona = new Personas();
        if($persona -> inicioSesion($correo, $clave)){
                $_SESSION['id']= $persona -> getId();
                $_SESSION['entity']="Persona";
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/persona/sesionPersonas.php") . "'</script>";
        }
        $logInError=true;
    }
}
?>
<div class="container align-middle" >
	<div class="row"> 
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4><strong>NUVU</strong></h4>
				</div>
				<div class="card-body">
					<p>API</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3 offset-md-4">
			<div class="card " >
				<div class="card-header">
					<h4><strong>Iniciar Sesi&oacute;n</strong></h4>
				</div>
				<div class="card-body">
				<!-- action="index.php" -->
					<form id="form" method="post"  class="bootstrap-form needs-validation"  >
						<div class="form-group">
							<div class="input-group" >
								<input type="email" class="form-control" name="correo" placeholder="Correo" autocomplete="off" required />
							</div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="clave" placeholder="Contrase&ntilde;a" required />
						</div>
						<?php if($logInError){
							echo "<div class='alert alert-danger' >Correo o contrase&ntilde;a incorrectos</div>";
						} ?>
						<div class="form-group">
							<a href="index.php?pid=<?php echo base64_encode("ui/registro.php") ?>">No tiene cuenta? Registrese.</a>
						</div>
						<div class="form-group">
							<button type="submit" class="btn" name="logIn">Iniciar Sesi&oacute;n</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
