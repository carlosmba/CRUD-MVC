		<h2 class="text-center">Registrate</h1>
		<div class="d-flex justify-content-center text-center">
			<form action="http://localhost/proyectos/CRUD/index.php?pag=register" method="POST">
				
				<div class="form-group">
					<label for="name">Nombre:</label>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
					<input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
					</div>

				</div>



				<div class="form-group">
					<label for="email">Email address:</label>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
						</div>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
					</div>

				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-unlock"></i></span>
						</div>
					<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pass">
					</div>
				</div>
				<div class="form-group form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox"> Remember me
					</label>
				</div>
					<?php
					
				$registro = FormsControllers::ctrRegister();

				if($registro == 'ok'){
					echo '<script>

						if(window.history.replaceState){
							window.history.replaceState(null,null,window.location.href)
						}

					</script>';
					echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
				}


				if($registro=='error'){
					echo '<script>

						if(window.history.replaceState){
							window.history.replaceState(null,null,window.location.href)
						}

					</script>';
					echo '<div class="alert alert-danger">Error, no se permiten caracteres especiales</div>';
				}
			?>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
