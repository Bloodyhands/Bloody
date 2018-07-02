<?php
require_once ('models\ConnectionManager.php');

function connection()
{
	$connectionManager = new \projet3\Bloody\models\ConnectionManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$user = $connectionManager->connect($_POST['pseudo']);
		
		if (!$user) {
			throw new Exception('utilisateur inconnu');
		} else {
			if (password_verify($_POST['password'], $user['password'])) {
				session_start();
				$_SESSION['pseudo'] = $user['pseudo'];
				$_SESSION['name'] = $user['name'];
				$_SESSION['firstname'] = $user['firstname'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['age'] = $user['age'];
				$_SESSION['creation_date_fr'] = $user['creation_date_fr'];
				$_SESSION['role'] = $user['role'];
			}
			else {
				throw new Exception('mauvais mot de passe');
			}
		}

			header('Location: index.php');
	}

	require ('views\backend\connectionView.php');
}
