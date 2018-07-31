<?php
require_once('../config/config.class.php');

Class Validation extends Database {
	
	public function isAdmin($email, $token){

		$data = [
			'email' =>  $email,
			'token' =>  $token
		];
		
		$query = "SELECT * FROM jf_admins WHERE email = :email AND token = :token";
		$request = $this->_connection->prepare($query);
		$request->execute($data);
		
		return $request->rowCount($query);
	}

}