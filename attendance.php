<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - Employee Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h1>Clock In / Out</h1>
        <form action="clock_in_out.php" method="POST">
            <input type="number" name="employee_id" placeholder="Enter Employee ID" required>
            <button type="submit" name="clock_in">Clock In</button>
            <button type="submit" name="clock_out">Clock Out</button>
        </form>
    </div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
