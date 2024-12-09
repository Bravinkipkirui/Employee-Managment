<?php
include 'db/db_connection.php';  // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    
    // Handle clock-in
    if (isset($_POST['clock_in'])) {
        $clock_in = date('Y-m-d H:i:s');
        
        // Insert clock-in time into the attendance table
        $sql = "INSERT INTO attendance (employee_id, clock_in) VALUES ('$employee_id', '$clock_in')";
        if (mysqli_query($conn, $sql)) {
            echo "Clock-in successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Handle clock-out
    if (isset($_POST['clock_out'])) {
        $clock_out = date('Y-m-d H:i:s');
        
        // Update clock-out time and calculate hours worked
        $sql = "UPDATE attendance 
                SET clock_out = '$clock_out', 
                    hours_worked = TIMESTAMPDIFF(HOUR, clock_in, '$clock_out') 
                WHERE employee_id = '$employee_id' AND clock_out IS NULL";
        
        if (mysqli_query($conn, $sql)) {
            echo "Clock-out successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
