<?php

// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './auth/process.php';
if (isset($_SESSION['id']))
{?>
<?php include './loggedin.php'?>
<?php  die(); }

?>
<body>
      <h1>Welcome Back!</h1>
      <p>Enter your email address and password to access analytics panel.</p>

      <form class="user" method="post">
      <input type="text" placeholder="Email Address" name="unamail">
      <input type="password" placeholder="Password" name="password">
      <input  name="signin" type="submit" value="Login">
      <?php if (!empty($msg)): ?><div><?php echo $msg; ?></div><?php endif; ?>
      </form>

</body>