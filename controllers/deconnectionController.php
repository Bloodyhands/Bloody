<?php
function deconnection()
{
	session_start();
	
	unset ($_SESSION['pseudo']);
	unset ($_SESSION['firstname']);
	unset ($_SESSION['name']);
	unset ($_SESSION['role']);

	session_destroy();

	header('Location: index.php');
}