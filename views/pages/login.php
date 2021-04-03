
			<h1>Iniciar Sesión</h1>
			<form action="http://localhost/proyectos/CRUD/index.php?pag=login" method="POST">
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pass">
				</div>
				<div class="form-group form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox"> Remember me
					</label>
				</div>
				<?php
					
					$registro = new FormsControllers();
					$registro->ctrLogin();

				?>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
