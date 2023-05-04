<?php

$states = array(
	'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 
	'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 
	'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 
	'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 
	'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
);


require "data.php";

function post_req($url, $request_data) {
	global $API;
	$headers = array(
		'Content-Type: application/json',
		'X-Shkeeper-API-Key: ' + $KEY
	);

	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' => implode("\r\n", $headers),
			'content' => $request_data
		)
	);

	// Create the stream context
	$context = stream_context_create($options);

	// Send the HTTP request and get the response
	$response = file_get_contents($API . $url, false, $context);

	// Return the response
	return $response;
}

function get_req($url) {
	global $API;
	// Set the headers for the HTTP request
	$headers = array(
		'Content-Type: application/json',
		'X-Shkeeper-API-Key: ' + $KEY
	);

	// Set the stream context options for the HTTP request
	$options = array(
		'http' => array(
			'method' => 'GET',
			'header' => implode("\r\n", $headers)
		)
	);

	// Create the stream context
	$context = stream_context_create($options);

	// Send the HTTP request and get the response
	$response = file_get_contents($API . $url, false, $context);

	// Return the response
	return $response;
}

?>
