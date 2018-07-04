<?php
require_once ('models\StatisticManager.php');

function statistics()
{
	$statisticManager = new \projet3\Bloody\models\StatisticManager();
	$nbUsers = $statisticManager->countUsers();
	$nbPosts = $statisticManager->countPosts();

	require('views\backend\statisticsView.php');
}