<?php
require_once ('models\ConnectionManager.php');

function connection($id = NULL, $pseudo = NULL, $password = NULL)
{
	$connectionManager = new \projet3\Bloody\models\ConnectionManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$connectionManager->connect($id, $pseudo, $password);
		
		$passwordOk = password_verify($_POST['password'], $result['password']);
		
		if (!$result) {
			echo 'mauvais mot de passe';
		} else {
			if ($passwordOk) {
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['pseudo'] = $pseudo;
			}
			else {
				echo 'mauvais mot de passe';
			}
		}

			header('Location: index.php');
	}

	require ('views\backend\connectionView.php');
}
