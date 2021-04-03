<?php require_once 'connection.php' ?>

<?php
class ModelForms{

	static function modelRegister($table, $data){
		$stm = Connection::connect()->prepare("INSERT INTO $table(name, email, pass, token) VALUES(:name, :email, :pass, :token)");

		$stm->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$stm->bindParam(':email', $data['email'], PDO::PARAM_STR);
		$stm->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
		$stm->bindParam(':token', $data['token'], PDO::PARAM_STR);

		if($stm->execute()){
			return 'ok';
		}else{
			 print_r(Connection::connect()->errorInfo());
		}

		$stm->close();

		$stm = null;
	}

	static public function modelSelectRecords($table, $item, $value){

		if($item == null && $value == null){

			$stm = Connection::connect()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $table ORDER BY id DESC");

			$stm->execute();

			return $stm->fetchAll();	
		}else{
			$stm = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :value");

			// $stm->bindParam(':value', $value, PDO::PARAM_STR || PDO::PARAM_INT);
			$stm->execute(array(':value' => $value));

			return $stm->fetch();
		}

		$stm->close();
		$stm = null;
	}

	static function modelUpdateRecord($table, $data){
		$stm = Connection::connect()->prepare("UPDATE $table SET name=:name, email=:email, pass=:pass WHERE token=:token ");

		$stm->bindParam(':name', $data['name'], PDO::PARAM_STR);
		$stm->bindParam(':email', $data['email'], PDO::PARAM_STR);
		$stm->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
		$stm->bindParam(':token', $data['token'], PDO::PARAM_STR);

		if($stm->execute()){
			return 'ok';
		}else{
			 print_r(Connection::connect()->errorInfo());
		}

		$stm->close();

		$stm = null;
	}

	static function modelDeleteRecord($table, $token){
		$connect = Connection::connect()->prepare("DELETE FROM $table WHERE token=:token");

		$connect->bindParam(':token', $token, PDO::PARAM_STR);

		if($connect->execute()){
			return 'ok';
		}else{
			print_r(Connection::connect()->errorInfo());
		}

		$stm->close();

		$stm = null;
	}

	static function modelUpdateAttempts($table,$token,$attempts_failed){
		$stm = Connection::connect()->prepare("UPDATE $table SET attempts=:attempts WHERE token=:token ");

		$stm->bindParam(':attempts', $attempts_failed, PDO::PARAM_INT);
		$stm->bindParam(':token', $token, PDO::PARAM_STR);

		if($stm->execute()){
			return 'ok';
		}else{
			 print_r(Connection::connect()->errorInfo());
		}

		$stm->close();

		$stm = null;
	}


}



