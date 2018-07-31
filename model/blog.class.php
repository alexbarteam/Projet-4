<?php
require_once('./config/config.class.php');

class Blog extends Database {
	
	// Function to get all posts on blog view
	public function getAllPost() {
				
		$query = "SELECT jf_posts.id, jf_posts.title, jf_posts.image, jf_posts.date, jf_posts.content, jf_admins.name
				  FROM jf_posts JOIN jf_admins ON jf_posts.writer = jf_admins.email
				  WHERE posted='1' ORDER BY date ASC";
		
		$result = $this->_connection->query($query);
		
		if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetchObject()) {
            $rows[] = $row;
        }
        
        return $rows;
		
	}
	
}