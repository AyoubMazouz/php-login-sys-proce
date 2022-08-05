<?php

session_start();
$uid = $_SESSION["uid"];

if (!isset($uid)) {
	header("Location: ../index.php");
	exit();
}

$img_path = glob("../uploads/profile" . $uid . "*");
if (isset($img_path[0])) {
	if (!unlink($img_path[0])) {
		header("Location: ../profile.php?error=cannot_delete_img");
		exit();
	} else {
		header("Location: ../profile.php?profile=success");
		exit();
	}
} else {
	header("Location: ../profile.php?error=img_does_not_exist");
	exit();
}
