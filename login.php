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

                                    <h1 class="h5 mb-1">Welcome Back!</h1>
                                    <p class="text-muted mb-4">Enter your email address and password to access analytics panel.</p>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="unamail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <input class="btn btn-warning btn-block waves-effect waves-light" name="signin" type="submit" value="Login">

                                        <?php if (!empty($msg)): ?>
                                            <div class="mt-2 alert <?php echo $msg_class ?>"><?php echo $msg; ?>
                                            </div>
                                        <?php endif; ?>

                                    </form>


</body>