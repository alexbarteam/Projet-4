<?php
require_once('../config/config.class.php');

class Write extends Database {

	public function post($title, $content, $posted){

		$txt = [
			'title'     =>  $title,
			'content'   =>  $content,
			'writer'    =>  $_SESSION['admin'],
			'posted'    =>  $posted

		];

		$query = "INSERT INTO jf_posts(title,content,writer,date,posted)
				  VALUES(:title,:content,:writer,NOW(),:posted)";

		$result = $this->_connection->prepare($query);
		$result->execute($txt);

	}

	public function postImg($tmp_name, $extension){
		
		$id = $this->_connection->lastInsertId();
		$img = [
			'id'    =>  $id,
			'image' =>  $id.$extension      // $id = 1 , $extension = .jpg      $id.$extension = 1.jpg
		];
		
		$tmp_name = $_FILES['image']['tmp_name'];

		$query = "UPDATE jf_posts SET image = :image WHERE id = :id";
		
		$result = $this->_connection->prepare($query);
		$result->execute($img);
		
		move_uploaded_file($tmp_name,"../public/img/posts/".$id.$extension);
	}

}