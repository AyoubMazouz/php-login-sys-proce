
<?php

if (isset($_POST["profile_submit"])) {
	$file = $_FILES["file"];

	print_r($file);

	$file_name = $file["name"];
	$file_tmp = $file["tmp_name"];
	$file_error = $file["error"];
	$file_size = $file["size"];
	$file_type = $file["type"];

	$allowed_type = ["image/png", "image/jgp", "image/jpeg"];

	if ($file_error !== 0) {
		header("Location: ../profile.php?error=file_error");
		exit();
	} else if ($file_size > 4096000) {
		header("Location: ../profile.php?error=large_file");
		exit();
	} else if (!in_array($file_type, $allowed_type)) {
		header("Location: ../profile.php?error=invalid_file_type");
		exit();
	} else {
		session_start();
		$uid = $_SESSION["uid"];
		$ext = explode("/", $file_type)[1];
		move_uploaded_file($file_tmp, "../uploads/profile" . $uid . "." . $ext);
		header("Location: ../profile.php?profile=success");
		exit();
	}
}
