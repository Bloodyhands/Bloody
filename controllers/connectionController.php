<?php
require_once ('models\ConnectionManager.php');

function connection($id = NULL, $pseudo = NULL, $password = NULL)
{
	$connectionManager = new \projet3\Bloody\models\ConnectionManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {;
		$connectionManager->connect($id, $pseudo, $password);

			/*$connectionManager->createSession();*/

			header('Location: index.php');
	}

	require ('views\backend\connectionView.php');
}
/*function createSession()
{
	$_SESSION['user_id'] = $user->id;
	$_SESSION['user_pseudo'] = $user->pseudo;
	$_SESSION['user_firstname'] = $user->firstname;
	$_SESSION['user_name'] = $user->name;
	$_SESSION['user_email'] = $user->email;
}*/
