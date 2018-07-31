<?php
require_once('../config/config.class.php');

class Restricted extends Database {

	function isAdmin($email, $password)	{
	
		$infos = [
			'email'     =>  $email,
			'password'  =>  sha1($password)
		];

		$query = "SELECT * FROM jf_admins WHERE email = :email AND password = :password";
		$result = $this->_connection->prepare($query);
		$result->execute($infos);
		$exist = $result->rowCount($query);
		return $exist;
		print_r($exist);
	}

}
// End Class