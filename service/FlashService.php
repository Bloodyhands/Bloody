<?php

namespace Blog\Service;

class FlashService
{
    /**
     * FlashService constructor.
     */
    public function __construct()
    {
    	if (session_status() === PHP_SESSION_NONE) {
    		session_start();
    	}
    }

    /**
     * Crée un message flash en session
     *
     * @param $message
     * @param string $type
     */
    public function setFlash($message, $type = 'danger')
    {
    	$_SESSION['flashMessage'] = [
    		'type' => $type, 
    		'message' => $message
    	];
    }

    /**
     * Affichage des messages flash et suppression de la session
     */
    public function showFlashMessage()
    {
    	if (isset($_SESSION['flashMessage'])) {
    		echo '<div class="alert alert-' . $_SESSION['flashMessage']['type'] . '" role="alert">';
    		echo '<strong>'. $_SESSION['flashMessage']['message'] . '</strong>';
    		echo '</div>';

    		unset($_SESSION['flashMessage']);
    	}
    }
}
