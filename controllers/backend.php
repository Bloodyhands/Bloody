<?php
session_start();

require_once ('models\PostManager.php');
require_once ('models\CommentManager.php');

function addPost($title, $content)
{
	$postManager = new \projet3\Bloody\models\PostManager();
	$affectedLines = $postManager->insertPost($title, $content);

	if ($affectedLines === false) 
	{
		$_SESSION['error'] = 'Votre chapitre '. $post_id .' n\'a pas été créé';
		//throw new Exception('Impossible d\'ajouter le chapitre!');
	}
	else
	{
		$_SESSION['success'] = 'Votre chapitre '. $post_id .' a bien été créé';	
	}

	header ('Location: index.php?action=adminPost');
	require ('views\backend\addPostView.php');
}

function adminPost()
{
	require ('views\backend\addPostView.php');
}

function updatePost($id, $title = null, $content = null)
{
	$postManager = new \projet3\Bloody\models\PostManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$postManager->editPost($id, $title, $content);
	}

	$post = $postManager->getPost($id);
	require ('views\backend\editPostView.php');
}

function deletePost($id)
{
	if (!empty($_GET['id'])) {
		$postManager = new \projet3\Bloody\models\PostManager();
		$deletedPost = $postManager->clearPost($id);
		
		if ($deletedPost) {
			echo 'la suppression a eu lieu';
			require ('views\frontend\allPostsView.php');
		}
	}
}
