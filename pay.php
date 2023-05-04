<?php
require "lib.php";
require "shop.php";

session_start();

if (!isset($_SESSION["name"])) {
	print("Please fill the form before vising pay page.");
	exit();
}

// Sanity check, remove tabs
$_SESSION["name"] = str_replace("\t", " ", $_SESSION["name"]);

$prod = getProduct($_SESSION["id"]);
if ($prod == null) {
	print("No product id");
	exit();
}

// Send payment request with ID as session ID
$resp = post_req("api/v1/" . $_SESSION["crypto"] . "/payment_request",
	'{"external_id": "' . session_id() . '",' .
	'"callback_url": "https://danielc.dev/shop/callback.php",' .
	'"fiat": "USD",' . 
	'"amount": ' . strval($prod['price']['USD']) . '}'
);

if ($resp == False) {
	print("Internal Error");
	exit();
}

print($resp);
$resp = json_decode($resp);

if (isset($_SESSION["address"])) {
	// TODO: User reloads the page
} else {
	$_SESSION["address"] = $resp->wallet;
	$_SESSION["paid"] = "no";
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
		<?php
		if ($_SESSION["paid"] == "yes") {
			print("Payment recieved! Thanks for your business!<br>");
			print("TODO: allow download");
			print("</div></body></html>");
			exit();
		} else if ($_SESSION["paid"] == "no") {
			print("<i>Awaiting payment...</i>");
		} else {
			print("<i>Partial payment recieved: " . $_SESSION["paid"] . "</i>");
		}
		?>
		<h2>Pay for '<?php print($prod['name']); ?>'</h4>
		<p>Hello, <?php print($_SESSION["name"]); ?>, Send exactly <b><?php print($resp->amount); ?></b> <?php print($resp->display_name); ?> to:</p>
		<h4><code><?php print($resp->wallet); ?></code></h4>
		<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=dogecoin:<?php print($resp->wallet); ?>?amount=<?php print($resp->amount); ?>">
		<p>The price of <?php print($resp->display_name); ?> is currently $<?php print($resp->exchange_rate); ?>.</p>
	</div>
</body>
</html>
