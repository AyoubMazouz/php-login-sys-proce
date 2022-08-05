<?php
include "header.php";

if (!isset($_SESSION["uid"])) {
	header("Location: login.php");
	exit();
}
?>

<main class="profile">

	<div>
		<?php
		$img_path = glob("uploads/profile" . $_SESSION["uid"] . ".png");
		if (isset($img_path[0]) && file_exists($img_path[0])) {
			echo '<img src="' . $img_path[0] . '">';
		} else {
			echo '<img src="uploads/default_profile.png">';
		}
		?>
	</div>

	<form action="inc/upload_profile_img.inc.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit" name="profile_submit">Upload image</button>
	</form>

	<a href="inc/delete_profile_image.inc.php">Delete profile image</a>

	<h3><?php echo $_SESSION["username"] ?></h3>
	<h3><?php echo $_SESSION["email"] ?></h3>
</main>