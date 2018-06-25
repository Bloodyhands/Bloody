<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class ConnectionManager extends Manager
{
	public function connect ($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pseudo, password, name, firstname, role FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $pseudo);
		$req->execute();

		return $req->fetch();
	}
}