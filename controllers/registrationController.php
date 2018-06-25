<?php
require_once ('models\RegistrationManager.php');

function registration($pseudo = NULL, $name = NULL, $firstname = NULL, $age = NULL, $email = NULL, $password = NULL)
{
	$registrationManager = new \projet3\Bloody\models\RegistrationManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		if ($registrationManager->check_email($email) == 0) {
			$registrationManager->inscription($pseudo, $name, $firstname, $age, $email, $password);
		} else {
			throw new Exception('l\'email existe deja');
		}
	}

	require ('views\backend\registrationView.php');
}
