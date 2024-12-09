<?php
session_start();  // Start session to store notifications
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the leave_id is provided
    if (!isset($_POST['leave_id'])) {
        die("Missing leave ID.");
    }

    // Capture the leave_id
    $leave_id = $_POST['leave_id'];

    // Approve or reject based on the button clicked
    if (isset($_POST['approve'])) {
        $sql = "UPDATE leaves SET status = 'approved' WHERE id = '$leave_id'";
        $_SESSION['message'] = "Leave request approved successfully.";
        $_SESSION['msg_type'] = "success";
    } elseif (isset($_POST['reject'])) {
        $sql = "UPDATE leaves SET status = 'rejected' WHERE id = '$leave_id'";
        $_SESSION['message'] = "Leave request rejected.";
        $_SESSION['msg_type'] = "warning";
    }

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the Manager Dashboard (or wherever you want)
        header("Location: pages/manager_dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Error updating leave request: " . mysqli_error($conn);
        $_SESSION['msg_type'] = "error";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
