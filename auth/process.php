<?php
ob_start();  // start output buffering
session_start(); // start the session
include './config.php';
global $conn;
$msg = "";
$msg_class = "";

if (isset($_POST['signin'])) {
    if (empty($_POST['unamail']) || empty($_POST['password'])) {
        $msg = "Complete all fields!";
        $msg_class = "alert-danger";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['unamail']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows < 1) {
            $msg = "Account does not exist";
            $msg_class = "alert-danger";
        } elseif ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (!password_verify($password, $row['password'])) {
                $msg = "Cross-check your password!";
                $msg_class = "alert-warning";
            } else {
                $_SESSION["id"] = $row['id'];
                header('Location: dashboard.php');
                exit(); // terminate script after redirect
            }
        }
    }
}
ob_end_flush();
?>