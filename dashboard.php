<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Employee Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome, Admin!</p>

        <!-- Summary of Employees -->
        <h2>Summary</h2>
        <p>Total Employees: 
        <?php
            include '../db/db_connection.php';
            $sql = "SELECT COUNT(id) AS total FROM employees";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['total'];
        ?>
        </p>

        <!-- Pending Leave Requests -->
        <h2>Pending Leave Requests</h2>
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            <?php
                $sql = "SELECT * FROM leaves WHERE status = 'pending'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["employee_id"] . "</td><td>" . $row["leave_type"] . "</td><td>" . $row["start_date"] . "</td><td>" . $row["end_date"] . "</td><td>" . $row["status"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No pending leave requests.</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
