<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class PostManager extends Manager
{
	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, image, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 8');

		return $req;
	}
		
	public function getPost($post_id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, image, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post WHERE id = ?');
		$req->execute(array($post_id));
		$post = $req->fetch();

		return $post;
	}

	public function insertPost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO post(title, content, creation_date) VALUES (?, ?, NOW())');
		$affectedLines = $req->execute(array($title, $content));

		return $affectedLines;
	}
}