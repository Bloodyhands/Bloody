<?php

namespace projet3\Bloody\models;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
		return $db;
	}
}