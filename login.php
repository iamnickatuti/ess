<?php
include './auth/process.php'
;?>
<?php
if (isset($_SESSION['id']))
{?>
<?php include './loggedin.php'?>
<?php  die(); }
?>

<!DOCTYPE html>
<html lang="en">

<body>

<div>                          <p class="text-muted mb-4">Enter your email address and password to access analytics panel.</p>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="unamail">
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
                                    <!-- end row -->
                                </div> <!-- end .padding-5 -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end .w-100 -->
                </div> <!-- end .d-flex -->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</div>

</body>