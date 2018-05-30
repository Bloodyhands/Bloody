<?php
session_start();

require_once ('models\PostManager.php');
require_once ('models\CommentManager.php');

function addPost($title = null, $content = null)
{
	$postManager = new \projet3\Bloody\models\PostManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$postManager->insertPost($title, $content);
	}

	/*if ($postManager === false) {
		$_SESSION['error'] = 'Votre chapitre '.$id.' n\'a pas été créé';
	} else {
		$_SESSION['success'] = 'Votre chapitre '.$id.' a bien été créé';	
	}*/

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
