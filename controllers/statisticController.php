<?php

use Blog\Service\FlashService;
use Blog\Service\Authorization;
use Blog\Model\StatisticManager;

require_once ('models/StatisticManager.php');
require_once ('service/FlashService.php');
require_once ('service/Authorization.php');

function statistics()
{
	$statisticManager = new StatisticManager();
	$authorization = new Authorization();
	$flash = new FlashService();
	
	if (($authorization->adminIsAuthorized()) == TRUE ) {
		$nbUsers = $statisticManager->countUsers();
		$nbPosts = $statisticManager->countPosts();
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	require('views/backend/statisticsView.php');
}