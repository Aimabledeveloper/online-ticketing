<!DOCTYPE html>
<html>
<head>
    <title>All Clients</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>All Clients</h1>

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

    // Delete client record if delete button is clicked
    if (isset($_GET["delete"])) {
        $clientId = $_GET["delete"];
        $deleteSql = "DELETE FROM create_account WHERE adminid = $clientId";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Client deleted successfully.";
        } else {
            echo "Error deleting client: " . $conn->error;
        }
    }

    // Retrieve all records from the "create_account" table
    $sql = "SELECT * FROM create_account";
    $result = $conn->query($sql);

    // Check if records exist
    if ($result->num_rows > 0) {
        // Output the records in a table format
        echo "<table>
                <tr>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["country"] . "</td>
                    <td><a class='delete-btn' href='?delete=" . $row["adminid"] . "'>Delete</a></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>