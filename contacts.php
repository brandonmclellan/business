<?php
	/**
	 * File Name:		contacts.php
	 * Author:			Brandon McLellan
	 * Website Name:	Web Portfolio
	 * File Description:
	 *	
	 */
	require "includes/controller.php";
	 
	//Check for user logging in
	if (isset($_POST['login'])) {
		// If the login fails, it 
		if (!login($_POST['username'], $_POST['password'])) {
			$error = True;
			require 'login.php';
			die;
		}
	
		$_SESSION['mobile'] = isset($_POST['mobile']);
	}
	
	//Make sure user is logged in past this point
	if (!isset($_SESSION['id'])) {
		header('Location: login.php');
		die;
	}
	
	// Check if the user was trying to log out.
	if (isset($_GET['logout'])) {
		$_SESSION = array();
		session_destroy();
		header('Location: login.php');
	}
	
	if ($_SESSION['mobile']) {
		include "includes/contact_mobile.php";
	} else {
		include "includes/contact_view.php";
	}
?>