<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class ConnectionManager extends Manager
{
	public function connect ($id, $pseudo, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, password FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $_POST['pseudo']);
		$req->execute();
		$result = $req->fetch();

		
	}
}