<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class PostManager extends Manager
{
    /**
     * Retourne tous les articles
     *
     * @return bool|\PDOStatement
     */
	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 16');

		return $req;
	}

    /**
     * Retourne un article
     *
     * @param $post_id
     *
     * @return mixed
     */
	public function getPost($post_id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM post WHERE id = ?');
		$req->execute(array($post_id));
		$post = $req->fetch();

		return $post;
	}

    /**
     * Retourne un nouvel article dans la base données
     *
     * @param $title
     * @param $content
     *
     * @return bool|\PDOStatement
     */
	public function insertPost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO post(title, content, creation_date) VALUES (:title, :content, NOW())');
		$req->bindValue(':title', $title);
		$req->bindValue(':content', $content);
		$req->execute();
		
		return $req;
	}

    /**
     * Retourne la modification d'un article
     *
     * @param $id
     * @param $title
     * @param $content
     *
     * @return bool|\PDOStatement
     */
	public function editPost($id, $title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :title, content = :content, creation_date=NOW() WHERE id = :id');
		$req->bindParam(':title', $title);
		$req->bindParam(':content', $content);
		$req->bindParam(':id', $id);
		$req->execute();

		return $req;
	}

    /**
     * Suppression d'un article de la base de donnée
     *
     * @param $id
     */
	public function clearPost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM post WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();
	}
}