<?php
require_once ('models\ConnectionManager.php');

function connection($id = NULL, $pseudo = NULL, $password = NULL)
{
	$connectionManager = new \projet3\Bloody\models\ConnectionManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {;
		$connectionManager->connect($id, $pseudo, $password);

			header('Location: index.php');
	}

	require ('views\backend\connectionView.php');
}
