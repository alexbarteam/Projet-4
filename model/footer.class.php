<?php
require_once('./config/config.class.php');

class Footer extends Database {

	// Function to get the last post by date
	public function getLastPost() {
		
		$query = "SELECT jf_posts.id, jf_posts.title, jf_posts.image, jf_posts.date, jf_posts.content, jf_admins.name
				  FROM jf_posts JOIN jf_admins ON jf_posts.writer = jf_admins.email
				  WHERE posted = '1' ORDER BY date DESC LIMIT 0,1";
		
		$result = $this->_connection->query($query);
		        
        $rows = array();
        
        while ($row = $result->fetchObject()) {
            $rows[] = $row;
        }
        
        return $rows;
	
	}

}