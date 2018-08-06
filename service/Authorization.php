<?php

namespace projet3\Bloody\service;

class Authorization
{
    /**
     * @return bool
     */
    public function adminIsAuthorized()
    {
    	$authorized = ($_SESSION['role'] === 'admin');
    	return $authorized;
    }

	/**
	 * @return bool
	 */
	public function userIsAuthorized()
	{
		$authorized = ($_SESSION['role'] === 'user');
		return $authorized;
	}
}