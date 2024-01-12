<html>
<head>
    <title>Delet driver</title>
    <style>
        .registration-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form class="registration-form" action="" method="POST">
    <div class="form-group">
        <label for="driverid">Driver ID:</label>
        <input type="text" id="driverid" name="driverid">
    </div>
    <div class="form-group">
        <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname">
    </div>
    <div class="form-group">
        <label for="secondname">Second name:</label>
        <input type="text" id="secondname" name="secondname">
    </div>
    

    <button type="submit" name="submit">Delete</button>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online ticket";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $driverid = $_POST["driverid"];
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];

    // Validate the form data
    if (empty($driverid) || empty($firstname) || empty($secondname)) {
        echo "All fields are required.";
    } else {
        // Create a prepared statement
        $stmt = $conn->prepare("DELETE FROM drivers WHERE driverid = ? AND firstname = ? AND secondname = ?");
        $stmt->bind_param("sss", $driverid, $firstname, $secondname);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Driver deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
</body>
</html>