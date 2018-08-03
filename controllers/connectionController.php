<?php
require_once ('models\ConnectionManager.php');
require_once ('service\FlashService.php');

function connection()
{
	$connectionManager = new \projet3\Bloody\models\ConnectionManager();
	$flash = new \projet3\Bloody\service\FlashService();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$user = $connectionManager->connect($_POST['pseudo']);
		
		if (!$user) {
			$flash->setFlash('Utilisateur inconnu');

			header('Location: index.php?action=connection');
			exit;
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
				$flash->setFlash('Mauvais mot de passe');

				header('Location: index.php?action=connection');
				exit;
			}
		}

		$flash->setFlash('Connexion ok');

		header('Location: index.php');
	}

	require ('views\backend\connectionView.php');
}
