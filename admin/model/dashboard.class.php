<?php
require_once('../config/config.class.php');

class Dashboard extends Database {

	// Count number of comments, publications and admin
	public function inTable($table){
	
		$query = "SELECT COUNT(id) FROM jf_$table";
		$result = $this->_connection->query($query);
		
		return $number = $result->fetch();
	}

	// Get the color of the differents count number
	public function getColor($table, $colors){
		
		if(isset($colors[$table])){
			return $colors[$table];
		}
		else {
			return "primary-color";
		}
		
	}
	
	// Get the admin name log in
	public function getUser(){

		$query = "SELECT * FROM jf_admins WHERE email = '{$_SESSION['admin']}'";
	
		$sql = $this->_connection->query($query);

		$result = $sql->fetchObject();
		return $result;
		
	}

	// Get all the comments
	public function getComments(){

		$query = "SELECT jf_comments.id, jf_comments.name, jf_comments.email, jf_comments.date, jf_comments.post_id, jf_comments.comment, jf_posts.title
				  FROM jf_comments JOIN jf_posts ON jf_comments.post_id = jf_posts.id WHERE jf_comments.seen = '0'
				  ORDER BY jf_comments.date ASC";
		
		$result = $this->_connection->query($query);

		$rows = [];
		
		while($row = $result->fetchObject()){
			$rows[] = $row;
		}
		return $rows;
		
	}
	
	// Validate Comments Users
	public function validateCmt() {
		
		$seen = 1;
		
		$data = [
			'seen'	=> $seen
		];
		
		$query = "UPDATE jf_comments SET seen = :seen WHERE id = '{$_POST['id']}'";
		
		$result = $this->_connection->prepare($query);
		$result->execute($data);
		
	}
	
	// Delete Comments Users
	public function deleteCmt() {
				
		$query = "DELETE FROM jf_comments WHERE id = '{$_POST['id']}'";
			
		return $this->_connection->exec($query);
		
	}
	
}
// End Class