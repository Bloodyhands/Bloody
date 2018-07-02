<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class CommentManager extends Manager
{
	public function getComments($post_id)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, pseudo, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($post_id));

		return $comments;
	}

	public function getAllComments()
	{
		$db = $this->dbconnect();
		$req = $db->prepare('SELECT id, pseudo, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment ORDER BY comment_date DESC');
		$req->execute();

		return $req->fetchAll();
	}

	public function postComment($post_id, $pseudo, $comment)
	{
		$db = $this->dbconnect();
		$comments = $db->prepare('INSERT INTO comment(post_id, pseudo, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($post_id, $pseudo, $comment));

		return $affectedLines;
	}

	public function signal($comment_id)
	{
		$db = $this->dbconnect();
		$req = $db->prepare('INSERT INTO report(comment_id, report_date) VALUES(:comment_id, NOW())');
		$req->bindValue(':comment_id', $comment_id);
		
		return $req->execute();
	}

	public function getSignals($comment_id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM report INNER JOIN comment ON report.comment_id = comment.id WHERE report.comment_id = :comment_id');
		$req->bindValue(':comment_id', $comment_id);
		$req->execute();
		$signals = $req->fetchAll();

		return $signals;
	}

	public function clearComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comment WHERE id = :id');
		$req->bindParam(':id', $id);
		$req->execute();
	}
}