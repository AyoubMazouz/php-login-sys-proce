<?php include "header.php";

if (isset($_SESSION["uid"])) {
	echo "<h1>You are logged in.</h1>";
} else {
	echo "<h1>You are NOT logged in.</h1>";
}

?>


<main>



</main>


<?php include "footer.php" ?>