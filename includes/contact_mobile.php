<?php
	//Make sure the page was included and not run seperately.
	if (!defined('INCLUDED')) {
		header('Location: contacts.php');
		die;
	}
	
	$contacts = get_contacts();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Brandon McLellan's Portfolio</title>
		
		<link rel="stylesheet" href="mobile/themes/Theme.css" />
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
				<div data-role="navbar" data-grid="b" data-iconpos="left">
					<ul>
						<li><a href="index.html" data-icon="home">Home</a></li>
						<li><a href="aboutme.html" data-icon="star" class="ui-btn-active">About Me</a></li>
						<li><a href="contactme.html" data-icon="info">Contact Me</a></li>
					</ul>
				</div>
			</div>
			
			<!-- Content -->
			<div data-role="content" data-theme="a">
				<div class="contact-view">
					<div data-role="collapsible-set" data-mini="true" data-content-theme="c">
					<?php foreach ($contacts as $contact): ?>
						<div data-role="collapsible">
							<legend>
								<h3 class="name"><?=$contact['last_name'];?>, <?=$contact['first_name']?></h3>
								<?php if (count($contact['phone']) == 0): ?>
										<h4 class="phone_number">--</h4>
									<?php else:
										$main = array_pop($contact['phone']);
									?>
										<h4 class="phone_number">(<?=$main['type']?>) <a href="tel:<?=$main['number']?>"><?=$main['number']?></a></h4>
								<?php endif; ?>
							</legend>
							<div class="phone-list">
								<?php foreach($contact['phone'] as $phone): ?>
									<h4>(<?=$phone['type']?>) <a href="tel:<?=$phone['number']?>"><?=$phone['number']?></a></h4>
								<?php endforeach; ?>
							</div>
							<?php if (count($contact['email']) > 0): ?>
								<div class="email-list">
									<h4>Email List</h4>
									<?php foreach($contact['email'] as $email): ?>
										<a href="mailto:<?=$email['email']?>"><?=$email['email']?></a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if (count($contact['address']) > 0): ?>
									<div class="address-list">
										<h4>Address List</h4>
										<?php foreach($contact['address'] as $address): ?>
											<address>
												<?=$address['address']?><br />
												<?=$address['city']?>, <?=$address['province']?> <?=$address['postal_code']?><br />
												<?=$address['country']?>
											</address>									
											<a href="https://maps.google.ca/maps?q=<?=$address['address']?> <?=$address['city']?> <?=$address['province']?> <?=$address['country']?>"><img alt="Google Maps" src="images/map.png" /></a>
											<div class="type">(<?=$address['type']?>)</div>
										<?php endforeach; ?>	
									</div>
							<?php endif; ?>
											
							
						</div>
					<?php endforeach; ?>
					</div>
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