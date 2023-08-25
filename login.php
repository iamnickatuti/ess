<?php
include './auth/process.php';
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