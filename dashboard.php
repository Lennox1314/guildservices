<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?>#<?= htmlspecialchars($user['discriminator']) ?></h1>
    <p>User ID: <?= htmlspecialchars($user['id']) ?></p>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
