<?php
require_once('../config/config.class.php');

Class Password extends Database {

	public function update_password($password){

		$data = [
			'password'  =>  sha1($password),
			'session'   =>  $_SESSION['admin']
		];

		$query = "UPDATE jf_admins SET password = :password WHERE email = :session";
		$request = $this->_connection->prepare($query);
		$request->execute($data);

	}
	
}