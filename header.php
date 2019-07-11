<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/theme.default.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<title>Auction House</title>

	<header class="second_top_part fixed-top" >
<section class="top_part">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-lg-right text-md-center">
				<div class="top_property">
					<ul class="ul_property list-unstyled mb-0">
						<?php 
							session_start();
							if (!isset($_SESSION['logged_id'])) { 
								echo '<li class="li_property d-inline-block">
										<form  id="Loginform" class="forms">
											<input type="email" name="email" placeholder="username">
											<input type="password" name="password" placeholder="password">
											<input type="submit" class="btn btn-light" name="submit" value="Login">
										</form>
										<div id="response"></div>
									   </li>';

								
							} else {		
									   echo '<li class="li_property d-inline-block"><a href="sell.php"><button class="btn sell_button">Sell Your Property</button></a></li>';

									   echo '<li class="li_property d-inline-block">
										<a href="logout.php"><button class="btn sell_button">Logout</button></a>
										</li>';
										echo '<li class="li_property d-inline-block">
										<a href="#"><button class="btn sell_button" data-toggle="modal" data-target="#profile">Profile</button></a>
										</li>';
							}
						 ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


	<nav class="navbar navbar-expand-lg nav navbar-light bg-transparent" >
   		<div class="container">
   			<a href="#" class="logo_parts"><img src="image/logo.png" alt="realstate" class="img-fluid"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupported" aria-controls="navbarSupported" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupported">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link text-uppercase text-white" href="index.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-uppercase text-white" href="auction.php">Auction</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-uppercase text-white" href="event.php">Our Events</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-uppercase text-white" href="contact.php">Contact</a>
		      </li>
		    </ul>
		  </div>
		</div>
	</nav>
</header>
</head>
<body>





