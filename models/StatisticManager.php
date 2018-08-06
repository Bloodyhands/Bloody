<?php

namespace projet3\Bloody\models;

require_once('models\Manager.php');

class StatisticManager extends Manager
{
    /**
     * Retourne un nombre d'utilisateurs sur le site
     *
     * @return bool|\PDOStatement
     */
    public function countUsers()
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('SELECT COUNT(*) AS nb FROM user');
    	$req->execute();

    	return $req;
    }

    /**
     * Retourne le nombre d'article créé sur le site
     *
     * @return bool|\PDOStatement
     */
    public function countPosts()
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('SELECT COUNT(*) AS nb FROM post');
    	$req->execute();

    	return $req;
    }
}