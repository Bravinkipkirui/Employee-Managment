<?php
session_start();
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $position = $_POST['position'];
    $role = $_POST['role'];

    $sql = "INSERT INTO employees (name, email, password, position, role) VALUES ('$name', '$email', '$password', '$position', '$role')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Employee added successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error adding employee!";
        $_SESSION['msg_type'] = "error";
    }

    header("Location: pages/admin_dashboard.php");
    exit;
}
?>
