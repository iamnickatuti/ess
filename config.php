<?php
$host = "localhost";
$username = "theblend";
$password = "@dfm2019Ke";
$dbname = "theblend_ess";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

