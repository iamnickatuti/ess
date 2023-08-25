<?php
session_start();
include 'config.php';
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from DB
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Password is valid
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        echo 'safi sana';
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }
}
