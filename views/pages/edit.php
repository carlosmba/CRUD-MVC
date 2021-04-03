<?php  

if(!isset($_SESSION['validateLogin'])){
	header('Location: login');
// echo '<script> window.location = "login" </script>';
	return;
}else{
	if($_SESSION['validateLogin'] != 'ok'){
		header('Location: login');
// echo '<script> window.location = "login" </script>';
		return;	
	}
}

?>


<?php

if(isset($_GET['token'])){
			$item = 'token';
			$value = $_GET['token'];

			$registro = FormsControllers::ctrGetRecord($item, $value);

			}

?>
		<h2 class="text-center">Editar</h1>
		<div class="d-flex justify-content-center text-center">
			<form  method="POST">
				<input type="hidden" name="token" value="<?php echo $registro['token'];  ?>">
				<div class="form-group">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
					<input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo $registro['name']; ?>">
					</div>

				</div>
				<div class="form-group">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
						</div>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="<?php echo $registro['email']; ?>">
					</div>

				</div>
				<div class="form-group">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-unlock"></i></span>
						</div>
					<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pass">
					<input type="hidden" value="<?php echo $registro['pass']; ?>" name="passCurrent">
					</div>
				</div>
				<?php 
					$update = new FormsControllers();

					$update->ctrUpdateRecords();


				?>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</form>
		</div>
		