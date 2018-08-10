<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Service\FlashService;
use Blog\Service\Authorization;

require_once('models/PostManager.php');
require_once('models/CommentManager.php');
require_once('service/FlashService.php');
require_once('service/Authorization.php');

function allPosts()
{
	$postManager = new PostManager();
	$flash = new FlashService();
	$posts = $postManager->getAllPosts();

	require('views/frontend/allPostsView.php');
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	$flash = new FlashService();
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	if (isset($_GET['id']) && $_GET['id'] < 0) {
		$flash->setFlash('Aucun identifiant de chapitre envoyé');
		
		header('Location: index.php');
		exit;
	}

	require('views/frontend/postView.php');
}

function addPost($title = null, $content = null)
{
	$postManager = new PostManager();
	$flash = new FlashService();
	$authorization = new Authorization();

	if (($authorization->adminIsAuthorized()) == TRUE ) {
		if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
			$postManager->insertPost($title, $content);
			
			header('Location: index.php');
		}
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	require ('views/backend/addPostView.php');
}

function updatePost($id, $title = null, $content = null)
{
	$postManager = new PostManager();
	$flash = new FlashService();
	$authorization = new Authorization();

	if (($authorization->adminIsAuthorized()) == TRUE ) {
		if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
			$postManager->editPost($id, $title, $content);

			header('Location: index.php');
		}
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	$post = $postManager->getPost($id);
	require ('views/backend/editPostView.php');
}

function deletePost($id)
{
	$postManager = new PostManager();
	$flash = new FlashService();
	$authorization = new Authorization();

	if (($authorization->adminIsAuthorized()) == TRUE ) {	
		$postManager->clearPost($id);
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	header('Location: index.php');
}
