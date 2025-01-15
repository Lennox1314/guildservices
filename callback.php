<?php
session_start();

// Replace with your Discord app details
$client_id = '1328923275681726525';
$client_secret = 'QlqPvCElK44zPySdLZZMo6KPpa9X4t8w';
$redirect_uri = 'http://localhost:80/content/guildservices/callback.php';
$scope = 'identify email'; // Adjust scope as needed

// Check if 'code' is set in the query string
if (!isset($_GET['code'])) {
    die('No authorization code provided');
}

$code = $_GET['code'];

// Exchange code for access token
$token_url = 'https://discord.com/api/oauth2/token';
$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$token_info = json_decode($response, true);

if (!isset($token_info['access_token'])) {
    die('Failed to obtain access token');
}

$access_token = $token_info['access_token'];

// Fetch user information
$user_url = 'https://discord.com/api/users/@me';
$headers = [
    'Authorization: Bearer ' . $access_token,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$user_info = json_decode($response, true);

if (isset($user_info['id'])) {
    // Store user information in the session
    $_SESSION['user'] = $user_info;
    header('Location: dashboard.php');
} else {
    die('Failed to fetch user information');
}
?>
