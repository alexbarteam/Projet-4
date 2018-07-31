<?php
require_once('../config/config.class.php');

class UpdatePost extends Database {

	public function getPost() {

		$query = "SELECT jf_posts.id, jf_posts.title, jf_posts.image, jf_posts.date, jf_posts.content, jf_posts.posted, jf_admins.name
				  FROM jf_posts JOIN jf_admins ON jf_posts.writer = jf_admins.email
				  WHERE jf_posts.id = '{$_GET['id']}'";
		
		$request = $this->_connection->query($query);

		$result = $request->fetchObject();
		return $result;
	}

	public function editPost($title, $content, $posted, $id) {

		$edit = [
			'title'     => $title,
			'content'   => $content,
			'posted'    => $posted,
			'id'        => $id
		];

		$query = "UPDATE jf_posts SET title = :title, content = :content, date=NOW(), posted = :posted WHERE id = :id";
		
		$request = $this->_connection->prepare($query);
		$request->execute($edit);

	}
	
	public function deletePost() {
				
		$query = "DELETE FROM jf_posts WHERE id = '{$_POST['id']}'";
		
		$result = $this->_connection->query($query);
		
		return $result;
		
	}
	
}