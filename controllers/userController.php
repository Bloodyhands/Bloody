<?php
require_once ('service\FlashService.php');
require_once ('service\Authorization.php');

function showProfil()
{
	$authorization = new \projet3\Bloody\service\Authorization();
	$flash = new \projet3\Bloody\service\FlashService();

	if (($authorization->userIsAuthorized()) == FALSE ) {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	require('views\frontend\user\profilView.php');
}