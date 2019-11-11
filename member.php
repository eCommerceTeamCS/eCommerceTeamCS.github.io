	<?php
		session_start();	
	   	if(!isset($_SESSION['login'])){
			header("Location: signUp.html");		
		} 
	?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Birthday Kit - LitKits</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/box.jpg" alt="" /></span><span class="title">LitKits</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="signUp.html">Sign Up</a></li>
							<li><a href="aboutUs.html">About Us</a></li>
							<li><a href="contactUs.html">Contact Us</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Hey there member! Take a look at our most popular LitKits!</h1>
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="images/newpic01.jpg" width = "30" height ="100" alt="" />
									</span>
									<a href="dateNightKit.html">
										<h2>Date Night Kit</h2>
										<div class="content">
											<p>Planning a night in with your significant other? We got you covered.</p>
										</div>
									</a>
								</article>
								
								<article class="style5">
									<span class="image">
										<img src="images/newpic05.jpg" width = "30" height ="100" alt="" />
									</span>
									<a href="hangoverKit.html">
										<h2>Hangover Kit</h2>
										<div class="content">
											<p>Got a big party coming up? Beat the hangover ahead of time. We’ve got the perfect kit to get you back on your feet the morning after.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="images/newpic07.jpg" width = "30" height ="100" alt="" />
									</span>
									<a href="birthdayKit.html">
										<h2>Birthday Kit</h2>
										<div class="content">
											<p>Everyone deserves to feel special on their birthday. This kit is perfect for when you’ve got an important birthday coming up.</p>
										</div>
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="images/newpic02.jpg" width = "30" height ="100"  alt="" />
									</span>
									<a href="backSchoolKit.html">
										<h2>Back to School Kit</h2>
										<div class="content">
											<p>Whenever September rolls around, all students need a little pick me up. Get the school year started off right.</p>
										</div>
									</a>
								</article>


						</section>
							<div align="right">
							<form method="post" action="logout.php">
								<input type="submit" href="index.html" formmethod="post" value="Log Out?" />
							</form>
							</div>
							
						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
