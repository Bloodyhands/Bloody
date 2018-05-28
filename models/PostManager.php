<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class PostManager extends Manager
{
	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, image, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 16');

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

	public function editPost($title, $content, $id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :title, content = :content, update_date=NOW() WHERE id = :id');
		$modifiedPost = $req->execute(array('title' => $title, 'content' => $content, 'id' => $id));

		return $modifiedPost;
	}

	public function clearPost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM post WHERE id = ?');
	}
}