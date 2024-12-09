<?php
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $evaluation_date = date('Y-m-d');
    
    // Insert performance review into the database
    $sql = "INSERT INTO performance (employee_id, review, rating, evaluation_date) 
            VALUES ('$employee_id', '$review', '$rating', '$evaluation_date')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Performance evaluation submitted successfully!";
          header("Location: pages/manager_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
