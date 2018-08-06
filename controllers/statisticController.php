<?php
require_once ('models\StatisticManager.php');
require_once ('service\FlashService.php');
require_once ('service\Authorization.php');

function statistics()
{
	$statisticManager = new \projet3\Bloody\models\StatisticManager();
	$authorization = new \projet3\Bloody\service\Authorization();
	$flash = new \projet3\Bloody\service\FlashService();
	
	if (($authorization->adminIsAuthorized()) == TRUE ) {
		$nbUsers = $statisticManager->countUsers();
		$nbPosts = $statisticManager->countPosts();
	} else {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	require('views\backend\statisticsView.php');
}