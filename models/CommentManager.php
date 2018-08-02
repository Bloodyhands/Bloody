<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class CommentManager extends Manager
{
	/**
	 * Retourne l'ensemble des commentaires pour un article donné
	 *
	 * @return array
	 */
	public function getComments($post_id)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, pseudo, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($post_id));

		return $comments;
	}

    /**
     * Retourne tous les commentaires de tous les articles
     *
     * @return array
     */
	public function getAllComments()
	{
		$db = $this->dbconnect();
		$req = $db->prepare('SELECT id, pseudo, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment ORDER BY comment_date DESC');
		$req->execute();

		return $req->fetchAll();
	}

    /**
     * Ajout d'un commentaire sur un article
     *
     * @param $post_id
     * @param $pseudo
     * @param $comment
     *
     * @return bool
     */
	public function postComment($post_id, $pseudo, $comment)
	{
		$db = $this->dbconnect();
		$comments = $db->prepare('INSERT INTO comment(post_id, pseudo, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($post_id, $pseudo, $comment));

		return $affectedLines;
	}

    /**
     * Signalement d'un commentaire
     *
     * @param $comment_id
     *
     * @return bool
     */
	public function signal($comment_id)
	{
		$db = $this->dbconnect();
		$req = $db->prepare('INSERT INTO report(comment_id, report_date) VALUES(:comment_id, NOW())');
		$req->bindValue(':comment_id', $comment_id);
		
		return $req->execute();
	}

    /**
     * Retourne l'ensemble des signalements pour un commentaire donné
     *
     * @param $comment_id
     *
     * @return array
     */
	public function getSignals($comment_id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM report INNER JOIN comment ON report.comment_id = comment.id WHERE report.comment_id = :comment_id');
		$req->bindValue(':comment_id', $comment_id);
		$req->execute();
		$signals = $req->fetchAll();

		return $signals;
	}

    /**
     * Suppression d'un commentaire
     *
     * @param $id
     */
	public function clearComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comment WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();
	}
}