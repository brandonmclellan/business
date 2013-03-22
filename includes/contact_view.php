<?php
	//Make sure the page was included and not run seperately.
	if (!defined('INCLUDED')) {
		header('Location: contacts.php');
		die;
	}
	
	$contacts = get_contacts();
?>

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
                        <li><a href="projects.html" class="active-nav">Projects</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="https://github.com/brandonmclellan">GitHub</a></li>
                        <li><a href="contactme.html">Contact</a></li>
                    </ul>
                        
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<h2>Business Contacts</h2>
				<table id="contacts" class="contacts">
					<thead>
						<th >Last, First</th>
						<th width="30%">Phone Number</th>
					</thead>
					<tbody>
						<?php foreach ($contacts as $contact): ?>
						
						<tr class="contact_row">
							<td>
								<div class="name"><?=$contact['last_name'];?>, <?=$contact['first_name']?></div>
								<div class="contact" style="display:none;">
									<h2><?=$contact['last_name'];?>, <?=$contact['first_name']?></h2>
									<h3>Email Address List</h3>
									<hr>
									<?php if (count($contact['email']) == 0): ?>
									<div class="empty">No email available.</div>
									<?php endif; ?>
										<?php foreach($contact['email'] as $email): ?>
										<a href="mailto:<?=$email['email']?>"><?=$email['email']?></a>
										<?php endforeach; ?>
									<h3>Address</h3>
									<hr>
									<?php if (count($contact['address']) == 0): ?>
									<div class="empty">No address available.</div>
									<?php endif; ?>
									<?php foreach($contact['address'] as $address): ?>
									<address>
										<?=$address['address']?><br />
										<?=$address['city']?>, <?=$address['province']?> <?=$address['postal_code']?><br />
										<?=$address['country']?>
									</address>									
									<a href="https://maps.google.ca/maps?q=<?=$address['address']?> <?=$address['city']?> <?=$address['province']?> <?=$address['country']?>"><img alt="Google Maps" src="images/map.png" /></a>
									<div class="type"><?=$address['type']?></div>
									<?php endforeach; ?>
								</div>
							</td>
							<td>
									<?php if (count($contact['phone']) == 0): ?>
										--
									<?php else:
										$main = array_pop($contact['phone']);
									?>
										<a id="phone_number" href="tel:<?=$main['number']?>"><?=$main['number']?></a>
										<div id="phone_type"><?=$main['type']?></div>
									<?php endif; ?>
									<div class="extended_phone" style="display:none;">
										<?php foreach($contact['phone'] as $phone): ?>
										<a id="phone_number" href="tel:<?=$phone['number']?>"><?=$phone['number']?></a>
										<div id="phone_type"><?=$phone['type']?></div>
										<?php endforeach; ?>
									</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
            </div> <!-- #main -->
        </div> <!-- #main-container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
		<script src="js/contact_page.js"></script>
		
        <div class="footer-container">
            <footer class="wrapper">
                <h3>Copyright Brandon McLellan 2013</h3>
            </footer>
        </div>
    </body>
</html>
