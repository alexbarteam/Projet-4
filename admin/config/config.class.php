<?php
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
	
}
// End Class