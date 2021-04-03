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

<?php  $array = FormsControllers::ctrGetRecord(null,null); ?>
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Fecha</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($array as $row => $value) : ?>
					<tr>
						<td><?php echo ($row) + 1; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['date']; ?></td>
						<td>
							<div class="btn-group">
								<div class="px-3">
									<a href="index.php?pag=edit&token=<?php echo $value['token']; ?>" class="btn btn-warning">Editar</a>
								</div>

								<form method="POST">
									<input type="hidden" value="<?php echo $value['token'];?>" name="deleteToken">
								<button type="submit" class="btn btn-danger">Eliminar</button>
								</form>
								<?php
									$delete = new FormsControllers();
									$delete->ctrDelete();

								?>
							</div>

						</td>
					</tr>
				<?php endforeach; ?>
	
				</tbody>
			</table>
