<?php

namespace Blog\Model;

class Manager
{
    /**
     * Connexion à la base de données
     *
     * @return \PDO
     */
    protected function dbConnect()
    {
    	$db = new \PDO('mysql:host=db748897003.db.1and1.com;dbname=db748897003', 'dbo748897003', 'Gaia1402+');
    	return $db;
    }
}