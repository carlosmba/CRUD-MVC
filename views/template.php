<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://kit.fontawesome.com/0527423295.js" crossorigin="anonymous"></script>
	<!-- PLUGIN CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- PLUGIN JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<h3 class="text-center py-3">LOGO</h3>
		
	</div>
	
	<div class="container-fluid bg-light">
		<div class="container">
			<ul class="nav nav-justified py-2 nav-pills">
				<?php if(isset($_GET['pag'])):  ?>
					<?php if($_GET['pag'] == 'register') : ?>
						<li class="nav-item"><a href="register" class="nav-link active">Registro</a></li>
					<?php else : ?>
						<li class="nav-item"><a href="register" class="nav-link">Registro</a></li>
					<?php endif; ?>

					<?php if($_GET['pag'] == 'login'): ?>
						<li class="nav-item"><a href="login" class="nav-link active">Ingreso</a></li>
					<?php else : ?>
						<li class="nav-item"><a href="login" class="nav-link">Ingreso</a></li>
					<?php endif; ?>

					<?php if($_GET['pag'] == 'home'): ?>
						<li class="nav-item"><a href="home" class="nav-link active">Inicio</a></li>
					<?php else : ?>
						<li class="nav-item"><a href="home" class="nav-link">Inicio</a></li>
					<?php endif; ?>

					<?php if($_GET['pag'] == 'exit'): ?>
						<li class="nav-item"><a href="exit" class="nav-link active">Salir</a></li>
					<?php else : ?>
						<li class="nav-item"><a href="exit" class="nav-link">Salir</a></li>
					<?php endif; ?>

				<?php else : ?>
				<li class="nav-item"><a href="register" class="nav-link">Registro</a></li>
				<li class="nav-item"><a href="login" class="nav-link">Ingreso</a></li>
				<li class="nav-item"><a href="home" class="nav-link active">Inicio</a></li>
				<li class="nav-item"><a href="exit" class="nav-link">Salir</a></li>
				<?php endif; ?>
				
				
				
			</ul>
		</div>
	</div>

	<div class="container-fluid">
		<div class="container">
			<?php 
				if(isset($_GET['pag'])){

					if($_GET['pag'] == 'register' ||
						$_GET['pag'] == 'login' ||
						$_GET['pag'] == 'home' ||
						$_GET['pag'] == 'exit' ||
						$_GET['pag'] == 'edit'){
						include 'pages/'.$_GET['pag'] . '.php';
					}else{
					include_once 'pages/error404.php';
				}
				}else{
					include 'pages/home.php';
				}
			?>
		</div>
	</div>
</body>
</html>