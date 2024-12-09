<?php
session_start();
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];

    $sql = "DELETE FROM employees WHERE id='$employee_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Employee deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error deleting employee!";
        $_SESSION['msg_type'] = "error";
    }

    header("Location: pages/admin_dashboard.php");
    exit;
}
?>
