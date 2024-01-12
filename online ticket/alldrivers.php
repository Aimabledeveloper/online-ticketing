<html>
<head>
    <title>All drivers</title>
    <style>
        /* Apply green color to the header */
        header {
            background-color: green;
            color: white;
            padding: 10px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
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

// Retrieve all records from the drivers table
$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);

// Check if any records exist
if ($result->num_rows > 0) {
    // Output table header with green color
    echo '<table style="border-collapse: collapse;">
            <tr style="background-color: green; color: white;">
                <th>Driver ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Location</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Age</th>
                <th>Category</th>
            </tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["driverid"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["secondname"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["phonenumber"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>
</body>
</html>