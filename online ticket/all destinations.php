<html>
<head>
    <title>FFORM</title>
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

        .record-table {
            width: 100%;
            border-collapse: collapse;
        }

        .record-table th,
        .record-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .record-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #d32f2f;
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

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $destinationid = $_POST["destinationid"];
    $name = $_POST["name"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO destination (destinationid, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $destinationid, $name);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Check if delete request is submitted
if (isset($_POST["delete"])) {
    // Retrieve the destination ID to delete
    $destinationidToDelete = $_POST["delete"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("DELETE FROM destination WHERE destinationid = ?");
    $stmt->bind_param("s", $destinationidToDelete);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch all records from the destination table
$result = $conn->query("SELECT * FROM destination");

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>All Records:</h2>";
    echo "<table class='record-table'>";
    echo "<tr><th>Destination ID</th><th>Name</th><th>Delete</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["destinationid"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>";
        // Create a form with a delete button for each record
        echo "<form action='' method='POST'>";
        echo "<button type='submit' name='delete' value='" . $row["destinationid"] . "' class='delete-button'>Delete</button>";
        echo"</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the result set
$result->close();

// Close the connection
$conn->close();
?>
</body>
</html>