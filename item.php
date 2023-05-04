<?php
require "lib.php";
require "shop.php";

$id = $_SERVER['QUERY_STRING'];
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
<?php
$prod = getProduct($id);
if ($prod == null) {
	print("404");
} else {
	printProductPage($prod);
}
?>
</div>
</body>
</html>
