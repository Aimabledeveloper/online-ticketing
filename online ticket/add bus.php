
<html>
    <head>
        <title>Add bus</title>
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
        <label for="busid">Bus ID:</label>
        <input type="text" id="busid" name="busid">
    </div>
    <div class="form-group">
        <label for="busmode">Bus Model:</label>
        <input type="text" id="busmode" name="busmode">
    </div>
    <div class="form-group">
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity">
    </div>
    <div class="form-group">
        <label for="seatingcapacity">Seating Capacity:</label>
        <input type="number" id="seatingcapacity" name="seatingcapacity">
    </div>
    <div class="form-group">
        <label for="standingcapacity">Standing Capacity:</label>
        <input type="number" id="standingcapacity" name="standingcapacity">
    </div>
    <div class="form-group">
        <label for="length">Length:</label>
        <input type="number" id="length" name="length">
    </div>
    <div class="form-group">
        <label for="width">Width:</label>
        <input type="number" id="width" name="width">
    </div>
    <div class="form-group">
        <label for="fueltype">Fuel Type:</label>
        <input type="text" id="fueltype" name="fueltype">
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
    $busid = $_POST["busid"];
    $busmode = $_POST["busmode"];
    $capacity = $_POST["capacity"];
    $seatingcapacity = $_POST["seatingcapacity"];
    $standingcapacity = $_POST["standingcapacity"];
    $length = $_POST["length"];
    $width = $_POST["width"];
    $fueltype = $_POST["fueltype"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO bus (busid, busmode, capacity, seatingcapacity, standingcapacity, length, width, fueltype) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $busid, $busmode, $capacity, $seatingcapacity, $standingcapacity, $length, $width, $fueltype);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
    </body>
    </html>