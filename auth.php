<?php
session_start();
include 'config.php';
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = md5($_POST['password']); // Hash the password with md5

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $inputUsername, $inputPassword);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $inputUsername;
        header("Location: dashboard.php");
        exit; // It's a good practice to exit after header redirect.
    } else {
        echo "Incorrect credentials!";
    }

    $stmt->close();
}

$conn->close();
?>
