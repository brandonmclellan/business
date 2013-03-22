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
	}
	
	//Make sure user is logged in past this point
	if (!isset($_SESSION['id'])) {
		header('Location: login.php');
		die;
	}
	
	
	include "includes/contact_view.php";
?>