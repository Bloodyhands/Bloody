<?php

namespace Blog\Service;

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