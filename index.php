<?php
require "lib.php";
require "shop.php";
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
	<meta name="description" content="Based Tech Shop - dogecoin accepted">
	<meta name="keywords" content="software,shop,commerce,camera">
	<meta name="author" content="Daniel Cook">
</head>
<body>
<div class="c">
	<header>
		<h1 class="tc">Based Tech Store</h1>
	</header>

	<hr>

	<p class="tc">
		As of May 2023, Payments are accepted in Dogecoin, for fast and secure transactions.<br>
		Payments in Bitcoin and USD will be implemented in the future.
	</p>

	<div class="row">
		<?php
			printProductCard($products[0]);
		?>

		<div class="card 6 col"></div>
	</div>
</div>
</body>
</html>
