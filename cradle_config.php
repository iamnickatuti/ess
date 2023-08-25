<?php
$servername = "52.173.217.76:3306";
$username = "theblend";
$password = "@dfm2019Ke";
$dbname = "theblend_ess";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

