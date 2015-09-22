<?php

$url = 'https://api.particle.io/v1/devices/events?access_token=d54a41f8ab8f2b1771e08378e463a1d9e5194de3';

$cURL = curl_init();

curl_setopt($cURL, CURLOPT_URL, $url);
curl_setopt($cURL, CURLOPT_HTTPGET, true);

curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result = curl_exec($cURL);

curl_close($cURL);

print_r($result);

?>
