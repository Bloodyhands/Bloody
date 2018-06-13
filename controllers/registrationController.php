<?php
require_once ('models\RegistrationManager.php');

function registration($pseudo = NULL, $name = NULL, $firstname = NULL, $age = NULL, $email = NULL, $password = NULL)
{
	$registrationManager = new \projet3\Bloody\models\RegistrationManager();

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
		$count = $registrationManager->check_email($email);
		$sub = $registrationManager->inscription($pseudo, $name, $firstname, $age, $email, $password);
		if ($count === TRUE) {
			throw new Exception('cette adresse email est déjà utilisée');
		}
	}

	require ('views\backend\registrationView.php');
}
