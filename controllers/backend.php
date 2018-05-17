<?php
require_once ('models\PostManager.php');
require_once ('models\CommentManager.php');

function addPost($title, $content)
{
	$postManager = new \projet3\Bloody\models\PostManager();
	$affectedLines = $postManager->insertPost($title, $content);

	if ($affectedLines === false) 
	{
		throw new Exception('Impossible d\'ajouter le chapitre!');
	}
	else
	{
		header('Location: index.php?action=adminPost');
	}

	require ('views\backend\addPostView.php');
}

function adminPost()
{
	require ('views\backend\addPostView.php');
}