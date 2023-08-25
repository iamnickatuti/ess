<?php

include './config.php';
// Create connection
global $conn,$host,$username,$password,$dbname;

$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into DB using PDO
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashed_password]);
}

