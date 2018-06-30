<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class ConnectionManager extends Manager
{
	public function connect ($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pseudo, password, name, firstname, email, age, role, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM user WHERE pseudo = :pseudo');
		$req->bindParam(':pseudo', $pseudo);
		$req->execute();

		return $req->fetch();
	}
}