<?php

$client_id = '1328923275681726525';
$client_secret = 'QlqPvCElK44zPySdLZZMo6KPpa9X4t8w';
$redirect_uri = 'http://192.168.0.107:80/guildservices/callback.php';


if (!isset($_GET['code'])) {
   echo 'couldnt find code';
}

$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
    'scope' => 'identify'
];

print_r($data);

$data_string = http_build_query($data);

$discord_token_url = "https://discordapp.com/api/oauth2/token";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
?>


