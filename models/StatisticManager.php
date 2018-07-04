<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class StatisticManager extends Manager
{
	public function countUsers()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(*) AS nb FROM user');
		$req->execute();

		return $req;
	}

	public function countPosts()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(*) AS nb FROM post');
		$req->execute();

		return $req;
	}
}