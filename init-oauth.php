<?php

$discord_url = "https://discord.com/oauth2/authorize?client_id=1328923275681726525&response_type=code&redirect_uri=http%3A%2F%2F192.168.0.107%3A80%2Fguildservices%2Fcallback.php&scope=identify";

header("Location: $discord_url")

?>