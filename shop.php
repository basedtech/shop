<?php

require "data.php";

function printProductPage($product) {
    print('<div class="card">');

    print('<img src="' . $product['icon'] . '" width="100">');

    print('<h2>' . $product['name'] . '</h2>');
    print('<p>' . $product['desc'] . '</p>');

	if (count($product['screenshots'])) { 
	    print('<h3>Screenshots</h3>');
	    foreach ($product['screenshots'] as $screenshot) {
	        print('<img src="' . $screenshot . '">');
	    }
    }

    print('<p><a href="' . $product['url'] . '">View product page</a></p>');
    print('<p><strong>Price:</strong> $' . $product['price']['USD'] . ' USD / ' . $product['price']['DOGE'] . ' DOGE</p>');
	print('<a href="buy.php?' . $product['id'] . '" class="btn">Purchase with DOGE</a>');
    print('</div>');
}

function printProductCard($product) {
    print('<a href="item.php?' . $product['id'] .  '"><div class="card 6 col">');

    print('<img src="' . $product['icon'] . '" class="w-100">');

    print('<h2>' . $product['name'] . '</h2>');

	print('<p><strong>Price:</strong> ');
	if (isset($product['price']['USD'])) {
		print('$' . $product['price']['USD'] . ' USD / ');
	}
	if (isset($product['price']['DOGE'])) {
		print('' . $product['price']['DOGE'] . ' DOGE');
	}
	print('</p>');

    print('</div></a>');
}

function getProduct($id) {
	global $products;
	foreach ($products as $array) {
		if ($array['id'] == $id) {
			return $array;
		}
	}
	return null;
}

?>
