<?php
include '../config.php';

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM `employees` WHERE `emp_id` = ?");
    $stmt->bind_param('i', $emp_id);
    $stmt->execute();

    header("Location: index.php");
} else {
    echo "Invalid Employee ID";
}
?>
