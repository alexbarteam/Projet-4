<?php
require_once('../config/config.class.php');

Class Settings extends Database {

	public function email_taken($email) {

		$data = ['email'   =>  $email];
		
		$query = "SELECT * FROM jf_admins WHERE email = :email";
		
		$request = $this->_connection->prepare($query);
		$request->execute($data);
		
		$free = $request->rowCount($query);

		return $free;
	}

	// Create token
	public function token($length) {
		
		$chars = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
		return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
		
	}

	// Add admin and send token by mail
	public function add_admin($name, $email, $role, $token){

		$data = [
			'name'      =>  $name,
			'email'     =>  $email,
			'token'     =>  $token,
			'role'      =>  $role
		];

		$query = "INSERT INTO jf_admins(name, email, token, role) VALUES(:name, :email, :token, :role)";
		$request = $this->_connection->prepare($query);
		$request->execute($data);

		$subject = "Ajout Admin";
		$message = '
			<html lang="en" style="font-family: sans-serif;">
				<head>
					<meta charset="UTF-8">
				</head>
				<body>
					Voici votre identifiant et code unique à insérer sur <a href="http://alexandre-jacquin.fr/projet-4/admin/index.php?view=new">cette page</a>:
					<br/>Identifiant: '.$email.'
					<br/>Mot de passe: '.$token.'
					<br/>Vous êtes: '.$role.'
					<br/><br/>Après avoir inséré ces informations, vous devrez choisir un mot de passe.
				</body>
			</html>
		';

		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=UTF-8\r\n";
		$header .= 'From: contact@jean-forteroche.fr' . "\r\n" . 'Reply-To: contact@jean-forteroche.fr' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

		mail($email, $subject, $message, $header);

	}

	public function get_admin(){
		
		$query = "SELECT * FROM jf_admins";
		$request = $this->_connection->query($query);

		$results = [];
		
		while($rows = $request->fetchObject()){
			
			$results[] = $rows;
			
		}
		
		return $results;
		
	}
	
	public function delete_admin(){
		
		$query = "DELETE FROM jf_admins WHERE id = '{$_POST['id']}'";
		$request = $this->_connection->query($query);

		return $request;
		
		if($request = true) {
			header("Location:index.php?view=settings");
		}
		
	}

}