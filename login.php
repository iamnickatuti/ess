<?php
session_start();
// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add your CSS links here if you have any -->
</head>
<body>

<h1>Welcome Back!</h1>
<p>Enter your email address and password to access the analytics panel.</p>

<form class="user" method="post">
    <input type="text" placeholder="Email Address" name="unamail">
    <input type="password" placeholder="Password" name="password">
    <input name="signin" type="submit" value="Login">
    <?php if (!empty($msg)): ?>
        <div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
</form>

</body>
</html>
