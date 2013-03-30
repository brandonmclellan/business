<!--  
File Name: login.php
Author: Brandon McLellan
Website Name: Mobile Portfolio
Description: Mobile website login page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Brandon McLellan's Portfolio</title>
		
		<link rel="stylesheet" href="themes/Theme.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
			
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-add-back-btn="true" data-theme="a">
			<!-- Page Header -->
			<div data-role="header" data-position="inline">
				<div class="logo-center"></div>
				<!-- Navigation -->
				<div data-role="navbar" data-grid="c" data-iconpos="left">
					<ul>
						<li><a href="index.html" data-icon="home">Home</a></li>
						<li><a href="aboutme.html" data-icon="star">About Me</a></li>
						<li><a href="login.php" data-icon="gear" class="ui-btn-active">Login</a></li>
						<li><a href="contactme.html" data-icon="info">Contact Me</a></li>
					</ul>
				</div>
			</div>
			
			<!-- Content -->
			<div data-role="content" data-theme="a">
				<div class="contact-login">
					<form method="POST" action="../contacts.php" data-ajax="false">
						<input type="hidden" name="mobile" value="true" />
						
						<label for="username">Username:</label>
						<input type="text" name="username" id="username" value="" />
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" value="" />
						
						<input type="submit" name="login" id="login" value="Login" />
					</form>
				</div>
			</div>
			
			<!-- Page Footer -->
			<div data-role="footer">
				<h4>Copyright Brandon McLellan 2013</h4>
				<h4><a href="#">Full Site</a></h4>
			</div>
		</div>
	</body>
</html>