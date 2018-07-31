<?php
session_start();

class Database {
	
	// Declare variables for connection
	private $_dbhost;
	private $_dbusername;
	private $_dbpassword;
	private $_dbname;
	
	protected $_connection;

	// Set infos to the variables
	public function __construct() {
		$this->_dbhost		= "alexandrgmsperso.mysql.db";
		$this->_dbname		= "alexandrgmsperso";
		$this->_dbusername	= "alexandrgmsperso";
		$this->_dbpassword	= "Alexandre2007";
		$this->startConnection();
	}
	
	// Start connection to the database
	public function startConnection() {
		
		try {
			$this->_connection = new PDO('mysql:host='.$this->_dbhost.';dbname='.$this->_dbname, $this->_dbusername, $this->_dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}
		catch(PDOexception $e) {
			die("Une erreur est survenue lors de la connexion à la base de données : " . $e->getMessage());
		}
		
		return $this->_connection;
		
	}
	
	//
	public function admin(){
		// If session open like admin
		if(isset($_SESSION['admin'])){
			
			$infos = [
				'email' =>  $_SESSION['admin'],
				'role'  =>  'admin'
			];

			$query = "SELECT * FROM jf_admins WHERE email = :email AND role = :role";
			$result = $this->_connection->prepare($query);
			$result->execute($infos);
			$exist = $result->rowCount($query);

			return $exist;
		}
		else {
			return 0;
		}
		
	}

	//
	public function hasnt_password(){

		$query = "SELECT * FROM jf_admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
		$result = $this->_connection->prepare($query);
		$result->execute();
		$exist = $result->rowCount($query);
		
		return $exist;
	}

}
// End Class