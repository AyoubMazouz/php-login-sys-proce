<?php include "header.php" ?>

<form action="inc/login.inc.php" method="POST" class="form">

	<?php

	if (isset($_GET["error"])) {
		$error = $_GET["error"];

		switch ($error) {
			case "empty_field":
				echo '<h1 class="error">Input field is empty!</h1>';
				break;
			case "invalid_email":
				echo "<h1 class='error'>Email is invalid!</h1>";
				break;
			case "email_does_not_exist":
				echo "<h1 class='error'>Email does not exist!</h1>";
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

	<input type="text" name="email" placeholder="Email Address...">
	<input type="password" name="pwd" placeholder="Password...">
	<button type="submit" name="submit_btn">Submit</button>
</form>

<?php include "footer.php" ?>