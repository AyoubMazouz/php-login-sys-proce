<?php session_start() ?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="styles.css">

	<title>Log In Sys</title>
</head>

<body>

	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>

			<?php
			if (isset($_SESSION["uid"])) {
				echo '<li><a href="profile.php">Profile</a></li>';
				echo '<li><a href="inc/logout.inc.php">Log Out</a></li>';
			} else {
				echo '<li><a href="signup.php">Sign Up</a></li>';
				echo '<li><a href="login.php">Log In</a></li>';
			}
			?>

		</ul>
	</nav>