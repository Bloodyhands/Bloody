<?php
require_once ('models\RegistrationManager.php');
require_once ('service\FlashService.php');

function registration($pseudo = NULL, $name = NULL, $firstname = NULL, $age = NULL, $email = NULL, $password = NULL)
{
	$registrationManager = new \projet3\Bloody\models\RegistrationManager();
	$flash = new \projet3\Bloody\service\FlashService();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
			$flash->setFlash('email invalide');

			header('Location: index.php?action=registration');
			exit;
		}
		if ($registrationManager->check_email($email) == 0) {
			$registrationManager->inscription($pseudo, $name, $firstname, $age, $email, $password);
		} else {
			$flash->setFlash('Cet email est déjà existant');

			header('Location: index.php?action=registration');
			exit;
		}
	}

	require ('views\backend\registrationView.php');
}
