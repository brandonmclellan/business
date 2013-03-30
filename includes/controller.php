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
	
	/** get_contacts()
	 * 		Pulls every contact from database for given user.
	 */
	function get_contacts() {
		global $db;
		
		$contacts = array();
		
		$sql = 'SELECT id, first_name, last_name FROM contacts WHERE user_id = ? ORDER BY last_name ASC';
		$sth = $db->prepare($sql);
		$sth->bindValue(1, $_SESSION['id']);
		$sth->execute();
	
		// Pre-prepare statements to select phone numbers, addresses and email.
		$pth = $db->prepare('SELECT id, number, type FROM phone_numbers WHERE contact_id = ?');
		$ath = $db->prepare('SELECT id, address, city, province, country, postal_code, type FROM address WHERE contact_id = ?');
		$eth = $db->prepare('SELECT id, email FROM email_address WHERE contact_id = ?');
		
		// Iterate every contact for the given user.
		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			$contact = array(
				'id'			=> $row['id'],
				'last_name' 	=> $row['last_name'],
				'first_name'	=> $row['first_name'],
				'phone'			=> array(),
				'address'		=> array(),
				'email'			=> array()
			);
			
			// Pull current contacts phone numbers
			$pth->bindValue(1, $contact['id']);
			$pth->execute();
			
			while ($row = $pth->fetch(PDO::FETCH_ASSOC)) {
				$contact['phone'][] = $row;
			}
			$pth->closeCursor();
			
			// Pull current contacts addresses
			$ath->bindValue(1, $contact['id']);
			$ath->execute();
			
			while ($row = $ath->fetch(PDO::FETCH_ASSOC)) {
				$contact['address'][] = $row;
			}
			$ath->closeCursor();
			
			// Pull current email addresses
			$eth->bindValue(1, $contact['id']);
			$eth->execute();
			
			while ($row = $eth->fetch(PDO::FETCH_ASSOC)) {
				$contact['email'][] = $row;
			}
			$eth->closeCursor();
			
			// Add contact to list to return.
			$contacts[] = $contact;
		}
		
		return $contacts;
	}
?>