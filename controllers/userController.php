<?php

use Blog\Service\FlashService;
use Blog\Service\Authorization;

require_once ('service/FlashService.php');
require_once ('service/Authorization.php');

function showProfil()
{
	$authorization = new Authorization();
	$flash = new FlashService();

	if (($authorization->userIsAuthorized()) == FALSE ) {
		$flash->setFlash('Vous n\'avez pas accès à cette page');
		
		header ('Location: index.php');
		exit;
	}
	require('views/frontend/user/profilView.php');
}