<?php

$email = trim($_POST["email"], " ");
$pwd = trim($_POST["pwd"], " ");


if (isset($_POST["submit_btn"])) {
	if (empty($email) || empty($pwd)) {
		header("Location: ../login.php?error=empty_field");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../login.php?error=invalid_email");
		exit();
	} else {
		include "../dbh.php";
		$query = "SELECT * FROM users WHERE email=? OR username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $query)) {
			header("Location: ../login.php?error=sql_error");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $email, $username);
			mysqli_stmt_execute($stmt);
			$res = mysqli_stmt_get_result($stmt);
			$rows = mysqli_fetch_assoc($res);
			if (!$rows) {
				header("Location: ../login.php?error=email_does_not_exist");
				exit();
			} else {
				if (password_verify($pwd, $rows["pwd"])) {
					session_start();
					$_SESSION["uid"] = $rows["id"];
					$_SESSION["username"] = $rows["username"];
					$_SESSION["email"] = $rows["email"];
					header("Location: ../index.php?login=success");
					exit();
				} else {
					header("Location: ../login.php?error=pwd_wrong");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../login.php");
}
