<?php
	/* Filename: controller.php
	 * Author: Brandon McLellan
	 * Website Name: Web Portfolio
	 * File Description:
	 */
	
	// Get database configuration
	require './config.php';
	
	// Connect to database
	try {
		$db = new PDO(DSN, USER, PASSWORD);
	} catch(PDOException $e) {
		die("Unable to connect to database: " . $e->getMessage());
	}
	session_start();
	
	
	/** login($username, $password)
	 *	 Sanitizes and checks login information against database, if successful sets session information.
	 */
	function login($username, $password)
	{
		global $db;
		
		// Check username and password against database.
		$sth = $db->prepare('SELECT id, username, password FROM admin WHERE username LIKE ? AND password = ?');
		$sth->bindValue(1, $username);
		$sth->bindValue(2, md5($password));
		$sth->execute();

		$user_info = $sth->fetch(PDO::FETCH_ASSOC);
		// If there is no row retrieved then the username/password combination is incorrect.
		if (!$user_info) {
			return false;
		}
		
		// Set user information in session.
		$_SESSION['id'] = $user_info['id'];
		$_SESSION['username'] = $user_info['username'];
		
		return true;
	}
	
?>