<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class RegistrationManager extends Manager
{
	public function inscription ($pseudo, $name, $firstname, $age, $email, $pass_hash)
	{
		$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO user(pseudo, name, firstname, age, email, password, creation_date) VALUES (:pseudo, :name, :firstname, :age, :email, :password, NOW())');
		$req->bindValue(':pseudo', $pseudo);
		$req->bindValue(':name', $name);
		$req->bindValue(':firstname', $firstname);
		$req->bindValue(':age', $age);
		$req->bindValue(':email', $email);
		$req->bindValue(':password', $pass_hash);
		$req->execute();

		return $req;
	}

	public function check_email($email)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(email) FROM user WHERE email = :email');
		$req->bindParam(':email', $email);
		$req->execute();
		return $req->fetchColumn();
	}
}