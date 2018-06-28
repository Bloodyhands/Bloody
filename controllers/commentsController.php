<?php
require_once ('models\CommentManager.php');

function addComment($post_id, $pseudo, $comment)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$affectedLines = $commentManager->postComment($post_id, $pseudo, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire!');
	} else {
		header('Location: index.php?action=post&id=' . $post_id);
	}
}

function report($comment_id)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$signal = $commentManager->signal($comment_id);

		header('Location: index.php');
}