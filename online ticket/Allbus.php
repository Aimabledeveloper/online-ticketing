
<html>
    <head>
        <title>All bus</title>
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

// Retrieve all records from the "bus" table
$sql = "SELECT * FROM bus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<tr>';
    echo '<th style="border: 1px solid #ddd; padding: 8px; background-color: #4CAF50; color: white;" colspan="8">Bus Records</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Bus ID</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Bus Model</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Capacity</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Seating Capacity</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Standing Capacity</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Length</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Width</th>';
    echo '<th style="border: 1px solid #ddd; padding: 8px;">Fuel Type</th>';
    echo '</tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["busid"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["busmode"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["capacity"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["seatingcapacity"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["standingcapacity"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["length"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["width"] . '</td>';
        echo '<td style="border: 1px solid #ddd; padding: 8px;">' . $row["fueltype"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>
    </body>
    </html>