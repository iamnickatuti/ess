<?php
session_start();
global $conn,$host,$username,$password,$dbname;
include 'config.php';
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Hash the password with md5

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "Incorrect credentials!";
    }
}
?>

