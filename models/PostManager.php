<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class PostManager extends Manager
{
	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, image, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 6');

		return $req;
	}
		
	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, image, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}
}