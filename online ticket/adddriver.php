<html>
<head>
    <title>Add driver</title>
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
    <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
    </div>
    <div class="form-group">
        <label for="phonenumber">Phone number:</label>
        <input type="text" id="phonenumber" name="phonenumber">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age">
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category">
    </div>

    <button type="submit" name="submit">Add</button>
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
    $gender = $_POST["gender"];
    $location = $_POST["location"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $category = $_POST["category"];

    // Validate the form data
    if (empty($driverid) || empty($firstname) || empty($secondname) || empty($gender) || empty($location) || empty($phonenumber) || empty($email) || empty($age) || empty($category)) {
        echo "All fields are required.";
    } else {
        // Create a prepared statement
        $stmt = $conn->prepare("INSERT INTO drivers (driverid, firstname, secondname, gender, location, phonenumber, email, age, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $driverid, $firstname, $secondname, $gender, $location, $phonenumber, $email, $age, $category);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
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