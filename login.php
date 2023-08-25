<?php
include './auth/process.php';
session_start();
    if (isset($_SESSION['id']))
    {?>
<?php include './loggedin.php'?>
<?php  die(); }
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
