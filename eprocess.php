<!DOCTYPE html>
<html>
<head>
    <title>Log In | Employee Management System</title>
    <style>
        body {
            background-color: rgb(94, 170, 241);
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
		.avatar {
    		width: 100px;
    		height: 100px;
    		border-radius: 50%;
    		position: absolute;
    		top: -50px;
    		left: calc(50% - 50px);
		}

        .loginbox {
            width: 300px;
            background: #fff;
            color: #000;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }

        .loginbox h1 {
            margin: 0 0 20px 0;
            padding: 0;
            font-size: 24px;
            text-align: center;
        }

        .loginbox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .loginbox input[type="text"],
        .loginbox input[type="date"],
        .loginbox input[type="submit"] {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .loginbox input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        .loginbox input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>Employee Management System</h1>
            <ul id="navli">
                <li><a class="homeblack" href="index.html">HOME</a></li>
                <li><a class="homeblack" href="aboutus.html">ABOUT US</a></li>
                <li><a class="homered" href="elogin.html">Employee Login</a></li>
                <li><a class="homeblack" href="alogin.html">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="divider"></div>

    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1>Employee details login</h1>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Employee ID :</p>
            <input type="text" name="e1" placeholder="Enter ID of the Employee" required="required">
            <p>Department Name :</p>
            <input type="text" name="e2" placeholder="Enter Department Name" required="required">
            <p>Project ID :</p>
            <input type="text" name="e3" placeholder="Enter ID of the Project" required="required">
            <p>Project Name :</p>
            <input type="text" name="e4" placeholder="Enter Name of the Project" required="required">
            <p>Start Date :</p>
            <input type="date" name="e5">
            <p>End Date :</p>
            <input type="date" name="e6">
            <p>Budget :</p>
            <input type="text" name="e7" placeholder="Enter the Budget" required="required">
            <input type="submit" name="login-submit" value="Login">
        </form>
    </div>
</body>
</html>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['e1'], $_POST['e2'], $_POST['e3'], $_POST['e4'], $_POST['e5'], $_POST['e6'], $_POST['e7'])) {
        $emp_id = $_POST['e1'];
        $dep_name = $_POST['e2'];
        $proj_id = $_POST['e3'];
        $proj_name = $_POST['e4'];
        $start_date = $_POST['e5'];
        $end_date = $_POST['e6'];
        $budget = $_POST['e7'];
        
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO project (emp_id, dep_name, proj_id, proj_name, start_date, end_date, budget) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $emp_id, $dep_name, $proj_id, $proj_name, $start_date, $end_date, $budget);
        
        // Execute SQL statement
        if ($stmt->execute()) {
            echo "<script>alert('Record added successfully');</script>";
            echo "localhost is added";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo " ";
    }
}

// Close database connection
$conn->close();
?>
