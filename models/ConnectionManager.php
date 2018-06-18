<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class ConnectionManager extends Manager
{
	public function connect ($id, $pseudo, $password)
	{
		$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id = :id, password = :password FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':id', $id);
		$req->bindParam(':pseudo', $pseudo);
		$req->bindParam(':password', $password);
		$req->execute();
		$result = $req->fetch();
		
		if (password_verify($_POST['password'], $result['password'])) {
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['pseudo'] = $pseudo;
		}
	}
}