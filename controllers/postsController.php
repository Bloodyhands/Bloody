<?php
require_once ('models\PostManager.php');
require_once ('service\FlashService.php');

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
	$flash = new \projet3\Bloody\service\FlashService();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	if (isset($_GET['id']) && $_GET['id'] < 0) {
		$flash->setFlash('Aucun identifiant de chapitre envoyé');
		
		header('Location: index.php');
		exit;
	}

	require('views\frontend\postView.php');
}

function addPost($title = null, $content = null)
{
	$postManager = new \projet3\Bloody\models\PostManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$postManager->insertPost($title, $content);
		
		header('Location: index.php');
	}
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
