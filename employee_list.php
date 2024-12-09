<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management - Employee Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <h1>Employee Management</h1>

        <!-- Table to list all employees -->
        <h2>All Employees</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Contact Info</th>
            </tr>
            <?php
                include 'db/db_connection.php';
                $sql = "SELECT * FROM employees";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["department"] . "</td><td>" . $row["position"] . "</td><td>" . $row["contact_info"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No employees found.</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
