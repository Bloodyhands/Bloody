<?php
require_once('models\PostManager.php');
require_once('models\CommentManager.php');

function allPosts()
{
	$postManager = new \projet3\Bloody\models\PostManager();
	$posts = $postManager->getAllPosts();

	require('views\frontend\allPostsView.php');
}

function post()
{
	$postManager = new \projet3\Bloody\models\PostManager();
	$commentManager = new \projet3\Bloody\models\CommentManager();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('views\frontend\postView.php');
}

function addComment($postId, $pseudo, $comment)
{
	$commentManager = new \projet3\Bloody\models\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $pseudo, $comment);

	if ($affectedLines === false) 
	{
		throw new Exception('Impossible d\'ajouter le commentaire!');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $postId);
	}
}