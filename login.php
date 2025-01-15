<?php
// Replace with your Discord app details
$client_id = '1328923275681726525';
$client_secret = 'QlqPvCElK44zPySdLZZMo6KPpa9X4t8w';
$redirect_uri = 'http://localhost:80/content/guildservices/callback.php';
$scope = 'identify email'; // Adjust scope as needed

$login_url = "https://discord.com/api/oauth2/authorize?client_id=$client_id&redirect_uri=" . urlencode($redirect_uri) . "&response_type=code&scope=" . urlencode($scope);

?>
<a href="<?= $login_url ?>">
  <button>Login with Discord</button>
</a>
