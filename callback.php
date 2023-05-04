<?php

require "data.php";

http_response_code(200);

$headers = getallheaders();
$api_key = $_SERVER['HTTP_X_SHKEEPER_API_KEY'];

if ($api_key != $KEY) {
	print("idiot");
	exit();
}
$request_body = file_get_contents('php://input');

$data = json_decode($request_body);

// Start the session with the target session ID
session_id($data->external_id);
session_start();

if ($data->paid) {
	$_SESSION['paid'] = "yes";
	
	file_put_contents($ORDERS, $_SESSION["name"] . "\t" . $_SESSION["state"] . "\t" . $_SESSION["id"] . "\t" . $data->external_id, FILE_APPEND);	
} else {
	$_SESSION['paid'] = $data->balance_crypto;
}

http_response_code(202);
?>
