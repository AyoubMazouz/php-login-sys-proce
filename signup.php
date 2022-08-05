<?php include "header.php" ?>

<form action="inc/signup.inc.php" method="POST" class="form">

	<?php

	if (isset($_GET["error"])) {
		$error = $_GET["error"];

		switch ($error) {
			case "empty_field":
				echo "<h1 class='error'>Input field is empty!</h1>";
				break;
			case "invalid_username":
				echo "<h1 class='error'>Username is Invalid!</h1>";
				break;
			case "invalid_email":
				echo "<h1 class='error'>Email is invalid!</h1>";
				break;
			case "invalid_pwd":
				echo "<h1 class='error'>Password is invalid!</h1>";
				break;
			case "username_taken":
				echo "<h1 class='error'>Username already taken!</h1>";
				break;
			case "pwd_wrong":
				echo "<h1 class='error'>Wrong password!</h1>";
				break;
			case "sql_error":
				echo "<h1 class='error'>Something went wrong!</h1>";
				break;
		}
	}

	?>

	<input type="text" name="username" placeholder="Username...">
	<input type="email" name="email" placeholder="Email Address...">
	<input type="password" name="pwd" placeholder="Password...">
	<input type="password" name="confirm_pwd" placeholder="Confirm Password...">
	<button type="submit" name="submit_btn">Submit</button>
</form>

<?php include "footer.php" ?>