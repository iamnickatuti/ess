<?php
session_start();
include '../config.php';

$msg = "";

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $conn->prepare("UPDATE `employees` SET `full_name` = ?, `password` = ?, `username` = ?, `email` = ?, `department_id` = ?, `active` = ? WHERE `emp_id` = ?");
        $stmt->bind_param("ssssiii", $_POST['full_name'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['username'], $_POST['email'], $_POST['department_id'], $_POST['active'], $emp_id);
        if ($stmt->execute()) {
            $msg = "Employee updated successfully!";
        } else {
            $msg = "Error updating employee.";
        }
    }

    $stmt = $conn->prepare("SELECT `emp_id`, `full_name`, `password`, `username`, `email`, `department_id`, `active` FROM `employees` WHERE `emp_id` = ?");
    $stmt->bind_param('i', $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();

    if (!$employee) {
        echo "Invalid Employee ID";
        exit;
    }
} else {
    echo "Employee ID not provided";
    exit;
}

?>

<form method="post">
    Full Name: <input type="text" name="full_name" value="<?= $employee['full_name'] ?>"><br>
    <!-- Don't prefill password for security reasons. Leave it blank if user doesn't want to change. -->
    Password: <input type="password" name="password" placeholder="Leave blank to retain old password"><br>
    Username: <input type="text" name="username" value="<?= $employee['username'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $employee['email'] ?>"><br>
    Department ID: <input type="number" name="department_id" value="<?= $employee['department_id'] ?>"><br>
    Active: <input type="number" name="active" min="0" max="1" value="<?= $employee['active'] ?>"><br>
    <input type="submit" value="Update">
</form>

<?php
if ($msg) {
    echo "<p>$msg</p>";
}
?>
