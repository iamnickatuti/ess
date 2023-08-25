<?php
include '../config.php';

$result = $conn->query("SELECT `emp_id`, `full_name`, `password`, `username`, `email`, `department_id`, `active` FROM `employees`");
?>

<table border="1">
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Department ID</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['department_id'] ?></td>
            <td><?= $row['active'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['emp_id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['emp_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<a href="addEmployee.php">Add New Employee</a>
