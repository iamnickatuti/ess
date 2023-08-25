<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<a href="logout.php">Logout</a>
</body>
</html>
