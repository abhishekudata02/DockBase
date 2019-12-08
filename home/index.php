<?php
session_start();
$uname=$_SESSION['username'];
?>

<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>DockBase</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">DockBase</a>
					<nav id="nav">
						
						<a>Username:</a>
						 <?php echo "$uname"; ?>
						<a href="logout.php">Logout</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome to DockBase</h1>
				<p>PAAS For Various Databases</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>MySQL</h3>
							</header>
							<p>An open-source relational database management system.</p>
							<footer>
								<a href="http://localhost:8082/?server=mysql-dev&username=newuser&db=stud" class="button special">Open</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>PostgreSQL</h3>
							</header>
							<p>PostgreSQL a free and open-source relational database management system emphasizing extensibility</p>
							<footer>
								<a href="http://localhost:8082/?pgsql=postdb&username=root" class="button special">Open</a>
							</footer>
						</article>
						<article>
							<header>
								<h3>MongoDB</h3>
							</header>
							<p>MongoDB is a cross-platform document-oriented database program</p>
							<footer>
								<a href="http://localhost:8091/" class="button special">Open</a>
							</footer>
						</article>
					</div>
				</div>
			</section>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>