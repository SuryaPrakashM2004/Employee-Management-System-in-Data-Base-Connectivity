<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
</head>
<body>
    <h2 style="text-align:center"><strong>The Project Details of the Employees</strong></h2>

<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Replace 'your_username' with your actual username
$password = ""; // Replace 'your_password' with your actual password
$database = "employee"; // Change this to your database name
$table = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the project table
$sql = "SELECT emp_id, dep_name, proj_id, proj_name, start_date, end_date, budget FROM $table";
$result = $conn->query($sql);

// Check if there are any results
echo "<div class='center'>"; 
if ($result->num_rows > 0) {
    // Print table header
    echo "<table border='1'>
            <tr>
                <th>Employee ID</th>
                <th>Department Name</th>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>";

    // Print data rows
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["emp_id"]."</td>
                <td>".$row["dep_name"]."</td>
                <td>".$row["proj_id"]."</td>
                <td>".$row["proj_name"]."</td>
                <td>".$row["start_date"]."</td>
                <td>".$row["end_date"]."</td>
                <td>".$row["budget"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</div>";

// Close connection
$conn->close();
?>

</body>
</html>