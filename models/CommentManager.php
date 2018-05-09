<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, pseudo, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($postId));

	    return $comments;
	}

	public function postComment($postId, $pseudo, $comment)
	{
		$db = $this->dbconnect();
		$comments = $db->prepare('INSERT INTO comment(post_id, pseudo, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $pseudo, $comment));

		return $affectedLines;
	}
}