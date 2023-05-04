<?php

// Midpoint to initialize session after form POST

session_start();

$new = True;
if (isset($_SESSION["name"])) {
	$new = False;
} else {
	if (isset($_POST['name']) && isset($_POST['id'])) {
		$_SESSION["name"] = $_POST['name'];
		$_SESSION["id"] = $_POST['id'];
		$_SESSION["crypto"] = "DOGE";
	} else {
		print("POST missing info");
		exit();
	}
}

header('Location: pay.php');
exit;

?>
