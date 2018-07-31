<?php
require_once('./config/config.class.php');

class Post extends Database {

	// Function to get single post by id
	public function getSinglePost() {
		
		if (isset($_GET['id'])) {	
			$postid = $_GET['id'];
		}
		
		$query = "SELECT jf_posts.id, jf_posts.title, jf_posts.image, jf_posts.date, jf_posts.content
				  FROM jf_posts
				  WHERE jf_posts.id = $postid";
		
		$result = $this->_connection->query($query);
		        
        $rows = array();
        
        while ($row = $result->fetchObject()) {
            $rows[] = $row;
        }
        
        return $rows;
	
	}
	
	// Function to add comment
	public function addComment($name, $email, $comment) {

		$cmt = array(
			'name'      => $name,
			'email'     => $email,
			'comment'   => $comment,
			'post_id'   => $_GET['id'],
			'seen'		=> 0

		);

		$query = "INSERT INTO jf_comments(name, email, comment, post_id, date, seen) VALUES(:name, :email, :comment, :post_id, NOW(), :seen)";
		$result = $this->_connection->prepare($query);
		$result->execute($cmt);

	}

	// Function to get all comments
	public function getComments() {
		
		if (isset($_GET['id'])) {	
			$postid = $_GET['id'];
		}
		
		$query = "SELECT * FROM jf_comments WHERE post_id = '$postid' AND seen = '1' ORDER BY date DESC";
		$result = $this->_connection->query($query);
		$rows = array();
		
		while($row = $result->fetchObject()) {
			$rows[] = $row;
		}

		return $rows;

	}

}