<?php
require "lib.php";
require "shop.php";

$id = $_SERVER['QUERY_STRING'];

session_destroy();
session_unset();

// Cancel session cookie when page is visitied
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

$prod = getProduct($id);
if ($prod == null) {
	print("404");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Based Tech Shop</title>
	<meta charset="UTF-8">
	<link rel="icon" href="/favicon.ico">
	<link rel="stylesheet" href="/lit.css">
	<style>
	.icon {
		width: 15px;
		vertical-align: middle;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Daniel Cook">
</head>
<body>
<div class="c">
<form action="check.php" method="post">
	<h4>Purchase '<?php print($prod['name']); ?>'</h4>
	<input type="hidden" name="id" value="<?php print($prod['id']); ?>">
	<div class="row">
		<div class="6 col">
			Name
			<input class="card w-100" name="name" type="text" placeholder="John Doe">
		</div>
		<div class="6 col">
			US State
			<select name="state" class="card w-100">
			<?php
			foreach ($states as $state) {
				echo '<option value="' . $state . '">' . $state . '</option>';
			}
			?>
			</select>
		</div>
	</div>
	<div class="row">
		<input type="checkbox">
		I agree that all purchases are final, and there are no refunds.
		<hr>
		<input type="submit" value="Submit" class="btn primary">
	</div>
</form>
</div>
</body>
</html>
