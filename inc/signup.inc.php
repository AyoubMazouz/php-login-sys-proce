<?php

$username = trim($_POST["username"], " ");
$email = trim($_POST["email"], " ");
$pwd = trim($_POST["pwd"], " ");
$confirm_pwd = trim($_POST["confirm_pwd"], " ");

if (isset($_POST["submit_btn"])) {
	if (empty($username) || empty($email) || empty($pwd) || empty($confirm_pwd)) {
		header("Location: ../signup.php?error=empty_field");
		exit();
	} else {
		if (strlen($username) < 3) {
			header("Location: ../signup.php?error=invalid_username");
			exit();
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../signup.php?error=invalid_email");
			exit();
		} else if ($pwd != $confirm_pwd || $pwd < 6) {
			header("Location: ../signup.php?error=invalid_pwd");
			exit();
		} else {
			include "../dbh.php";
			$query = "SELECT username FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $query)) {
				header("Location: ../signup.php?error=sql_error");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) > 0) {
					header("Location: ../signup.php?error=username_taken");
					exit();
				} else {
					$query = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $query)) {
						header("Location: ../signup.php?error=sql_error");
						exit();
					} else {
						$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_pwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../login.php?signup=success");
						exit();
					}
				}
			}
		}
	}
} else {
	header("Location: ../signup.php");
}
