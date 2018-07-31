<?php
require_once('./config/config.class.php');

class Home extends Database {
	
	// Function to get last 3 posts
	public function getHomePost() {
				
		$query = "SELECT jf_posts.id, jf_posts.title, jf_posts.image, jf_posts.date, jf_posts.content, jf_admins.name
				  FROM jf_posts JOIN jf_admins ON jf_posts.writer = jf_admins.email
				  WHERE posted='1' ORDER BY date DESC LIMIT 0,3";
		
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
		
	// Function to get last 3 comments
	public function getLastComments() {
			
		$query = "SELECT jf_comments.name, jf_comments.comment, jf_comments.post_id, jf_posts.id, jf_posts.title
				  FROM jf_comments JOIN jf_posts ON jf_comments.post_id = jf_posts.id
				  WHERE seen = '1' ORDER BY jf_comments.date DESC LIMIT 0,3";
		$result = $this->_connection->query($query);
		$rows = array();
		
		while($row = $result->fetchObject()) {
			$rows[] = $row;
		}

		return $rows;

	}
	
}
// End Class HomePost