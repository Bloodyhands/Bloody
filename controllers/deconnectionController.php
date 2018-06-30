<?php
function deconnection()
{
	session_start();
	
	unset ($_SESSION['pseudo']);
	unset ($_SESSION['firstname']);
	unset ($_SESSION['name']);
	unset ($_SESSION['role']);
	unset ($_SESSION['age']);
	unset ($_SESSION['creation_date_fr']);
	unset ($_SESSION['email']);

	session_destroy();

	header('Location: index.php');
}