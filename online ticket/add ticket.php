
<html>
    <head>
        <title>Add tickets</title>
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
        <label for="ticketid">Ticket ID:</label>
        <input type="text" id="ticketid" name="ticketid">
    </div>
    <div class="form-group">
        <label for="depature">Departure:</label>
        <input type="date" id="depature" name="departure">
    </div>
    <div class="form-group">
        <label for="platenumber">Plate number:</label>
        <input type="text" id="platenumber" name="platenumber">
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
    </div>
    <div class="form-group">
        <label for="arrival">Arrival:</label>
        <input type="date" id="arrival" name="arrival">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price">
    </div>
    <div class="form-group">
        <label for="time">Time:</label>
        <input type="text" id="time" name="time">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" id="status" name="status">
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
    $ticketid = $_POST["ticketid"];
    $departure = $_POST["departure"];
    $platenumber = $_POST["platenumber"];
    $location = $_POST["location"];
    $arrival = $_POST["arrival"];
    $price = $_POST["price"];
    $time = $_POST["time"];
    $status = $_POST["status"];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO ticket (ticketid, departure, platenumber, location, arrival, price, time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $ticketid, $departure, $platenumber, $location, $arrival, $price, $time, $status);

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