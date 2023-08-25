<?php
session_start();
if (!isset($_SESSION['id']))
{?>
    <?php include './notloggedin.php'?>
    <?php  die(); }
?>

<h1>Bazuu</h1>
