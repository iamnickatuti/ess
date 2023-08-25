<?php
session_start(); // Start session at the top
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add form validation as necessary

    $stmt = $conn->prepare("INSERT INTO `employees` (`full_name`, `password`, `username`, `email`, `department_id`, `active`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $_POST['full_name'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['username'], $_POST['email'], $_POST['department_id'], $_POST['active']);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Employee added successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error adding employee!";
        $_SESSION['msg_type'] = "danger";
    }

    header("Location: employees.php");
    exit;
}

?>

<form method="post">
    Full Name: <input type="text" name="full_name"><br>
    Password: <input type="password" name="password"><br>
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Department ID: <input type="number" name="department_id"><br>
    Active: <input type="number" name="active" min="0" max="1" value="1"><br>
    <input type="submit" value="Add">
</form>

<?php
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-" . $_SESSION['msg_type'] . "'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}
?>


