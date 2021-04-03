<?php

class Connection{

	static  function connect(){
		$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$pdo->exec('set names utf8');

		return $pdo;

	}


}



