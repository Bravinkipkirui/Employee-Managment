<?php
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    // Insert leave request into the database
    $sql = "INSERT INTO leaves (employee_id, leave_type, start_date, end_date, status) 
            VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date', 'pending')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Leave request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
