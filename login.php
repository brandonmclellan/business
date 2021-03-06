<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Brandon McLellan's Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/cycle.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
        	<div class="company-logo">
        		<img src="images/logo.fw.png" />
        	</div>
            <header class="wrapper clearfix">
                <h1 class="title">Brandon McLellan</h1>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="aboutme.html">About Me</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="https://github.com/brandonmclellan">GitHub</a></li>
						<li><a href="contacts.php" class="active-nav">Contact List</a></li>
                        <li><a href="contactme.html">Contact</a></li>
                    </ul>
                        
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<h2>Contacts Login Page</h2>
				<form method="POST" action="contacts.php">
					<?php if (isset($error)): ?>
					<div id="error">The username/password combination is incorrect.</div>
					<?php endif; ?>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" /><br />
					
					<label for="password">Password</label>
					<input type="password" name="password" id="password" /><br />
					
					<input type="submit" name="login" id="login" value="Login" />
				</form>
            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>Copyright Brandon McLellan 2013</h3>
            </footer>
        </div>
    </body>
</html>
