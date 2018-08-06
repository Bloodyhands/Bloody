<?php
require_once ('models\CommentManager.php');
require_once ('service\FlashService.php');
require_once ('service\Authorization.php');

function addComment($post_id, $pseudo, $comment)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$flash = new \projet3\Bloody\service\FlashService();

	if (empty($_POST['comment'])) {
		$flash->setFlash('Tous les champs ne sont pas remplis');
		
		header ('Location: index.php?action=post&id=' . $post_id);
		exit;
	} else {
		$commentManager->postComment($post_id, $pseudo, $comment);

		header('Location: index.php?action=post&id=' . $post_id);
	}
}

function report($comment_id, $post_id)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$signal = $commentManager->signal($comment_id, $post_id);

	header('Location: index.php?action=post&id=' . $post_id);
}

function allComments()
{
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$allComments = $commentManager->getAllComments();
	$flash = new \projet3\Bloody\service\FlashService();
	$authorization = new \projet3\Bloody\service\Authorization();

	if (($authorization->adminIsAuthorized()) == TRUE ) {
		$signals = array();
		foreach ($allComments as $comment) {
			if (!empty($commentManager->getSignals((int)$comment['id']))) {
				$signals[] = $comment['id'];
			}
		}
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	} 
	require('views\backend\signalsView.php');
}

function deleteComment($id)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();	
	$commentManager->clearComment($id);
	
	header('Location: index.php?action=allComments');
}
