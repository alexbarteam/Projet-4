<?php
require_once('../config/config.class.php');

class ListPosts extends Database {
	
	public function getAllPosts() {

		$query = "SELECT * FROM jf_posts ORDER BY date ASC";
		
		$result = $this->_connection->query($query);

		$rows = [];
		
		while($row = $result->fetchObject()) {
			$rows[] = $row;
		}

		return $rows;

	}
		
}