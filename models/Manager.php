<?php

namespace projet3\Bloody\models;

class Manager
{
    /**
     * Connexion à la base de données
     *
     * @return \PDO
     */
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
		return $db;
	}
}