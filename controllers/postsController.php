<?php

require_once ('models\PostManager.php');

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
	//$signals = $commentManager->getSignals($_GET['comment_id'], $_GET['post_id']);

	require('views\frontend\postView.php');
}

function addPost($title = null, $content = null)
{
	$postManager = new \projet3\Bloody\models\PostManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$postManager->insertPost($title, $content);
		
		header('Location: index.php');
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

		header('Location: index.php');
	}

	$post = $postManager->getPost($id);
	require ('views\backend\editPostView.php');
}

function deletePost($id)
{
	$postManager = new \projet3\Bloody\models\PostManager();	
	$postManager->clearPost($id);

	header('Location: index.php');
}
