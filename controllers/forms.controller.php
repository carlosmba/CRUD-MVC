<?php
class FormsControllers{

// Registrar Usuario
	static public function ctrRegister(){
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['name']) && preg_match('/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email']) && preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['pass'])){
				$table = 'records';
				$token = md5($_POST['name'] . '+' . $_POST['email']);
				$pass_encript = crypt($_POST['pass'], '$2a$07$usesomesillystringforsalt$');

				$array = array(
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'pass' => $pass_encript,
					'token' => $token
				);

				return ModelForms::modelRegister($table, $array);
			}else{
				return 'error';
			}

			
		}
	}

//Obtener Registros
	static public function ctrGetRecord($item, $value){
		$table = 'records';

		return $data = ModelForms::modelSelectRecords($table, $item, $value);

	}
//Iniciar Sesión
	public function ctrLogin(){
		if(isset($_POST['email'])){
			$table = 'records';
			$item = 'email';
			$value = $_POST['email'];
			//Obtener registro para comprobar si hay coincidencia
			$obj = ModelForms::modelSelectRecords($table, $item, $value);
			if($obj){
				$passEncript = crypt($_POST['pass'], '$2a$07$usesomesillystringforsalt$');
				if($obj['email'] == $_POST['email'] && $obj['pass'] == $passEncript){
					ModelForms::modelUpdateAttempts($table,$obj['token'], 0);
					$_SESSION['validateLogin'] = 'ok';	
					echo '<script>

					if(window.history.replaceState){
						window.history.replaceState(null,null,window.location.href)
					}

					window.location = "home";

					</script>';
				}else{
					if($obj['attempts'] <3){
						$attempts_failed = $obj['attempts'] + 1;
						ModelForms::modelUpdateAttempts($table,$obj['token'],$attempts_failed);
					}else{
						echo '<div class="alert alert-warning">Complete el reCAPTCHA</div>';
					}



					echo '<script>

					if(window.history.replaceState){
						window.history.replaceState(null,null,window.location.href)
					}
					</script>';
					echo '<div class="alert alert-danger">Correo o contraseña invalido</div>';
				}
			}else{
				echo '<script>

					if(window.history.replaceState){
						window.history.replaceState(null,null,window.location.href)
					}
					</script>';
					echo '<div class="alert alert-danger">El correo que ingreso no esta registrado</div>';
			}
		}
	}

//Actualizar Registro
	 public function ctrUpdateRecords(){
		if(isset($_POST['name']) && $_POST['email']){
			$response = 'error';
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['name']) && preg_match('/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])){
				$table = 'records';
				$user = ModelForms::modelSelectRecords($table,'token', $_POST['token']);
				$tokenComp = md5($user['name'] . '+' . $user['email']);
				

				if($_POST['token'] == $tokenComp){
					if($_POST['pass'] != ''){
						if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['pass'])){
							$pass = crypt($_POST['pass'], '$2a$07$usesomesillystringforsalt$');
						}
					}else{
						$pass = $_POST['passCurrent'];
					}
					$data = array(
					'token' => $_POST['token'],
					'name'=> $_POST['name'],
					'email' => $_POST['email'],
					'pass' => $pass
					);

					$response =  ModelForms::modelUpdateRecord($table, $data);
				}
				
			}else{
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}
				</script>';
				echo '<div class="alert alert-danger">No se aceptan caracteres especiales</div>';
			}


			if($response == 'ok'){
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

				</script>';
				echo '<div class="alert alert-success">Actualizado con exito</div>

				<script>

				setTimeout(function(){
					window.location = "home";

					}, 3000)

				</script>

				';

			}else{
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}
				</script>';
				echo '<div class="alert alert-danger">Error al actualizar</div>';
			}
		}
	}
//Eliminar registro

	public function ctrDelete(){

		if(isset($_POST['deleteToken'])){

			$table = 'records';

			$token = $_POST['deleteToken'];

			$delete = ModelForms::modelDeleteRecord($table, $token);

			if($delete == 'ok'){
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

				window.location = "home";
				</script>';
				
			}


		}


	}




}

