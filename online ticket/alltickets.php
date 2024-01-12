<html>
<head>
    <title>All tickets</title>
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

    try {
        // Create a new MySQLi object
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Check if a ticket deletion request is made
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ticketid"])) {
            $ticketId = $_POST["ticketid"];

            // Prepare and execute the delete statement
            $deleteQuery = "DELETE FROM ticket WHERE ticketid = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param("s", $ticketId);
            $stmt->execute();

            // Check if the delete operation was successful
            if ($stmt->affected_rows > 0) {
                echo "<p>Ticket with ID $ticketId has been deleted successfully.</p>";
            } else {
                echo "<p>Failed to delete the ticket with ID $ticketId.</p>";
            }

            $stmt->close();
        }

        // Retrieve all records from the "ticket" table
        $query = "SELECT * FROM ticket";
        $result = $conn->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<header>";
                echo "<h1>All Tickets</h1>";
                echo "</header>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Ticket ID</th>";
                echo "<th>Departure</th>";
                echo "<th>Plate Number</th>";
                echo "<th>Location</th>";
                echo "<th>Arrival</th>";
                echo "<th>Price</th>";
                echo "<th>Time</th>";
                echo "<th>Status</th>";
                echo "<th>Action</th>";
                echo "</tr>";

                // Display each record in a table row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ticketid'] . "</td>";
                    echo "<td>" . $row['departure'] . "</td>";
                    echo "<td>" . $row['platenumber'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['arrival'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><form method='post' onsubmit='return confirm(\"Are you sure you want to delete this ticket?\")'>";
                    echo "<input type='hidden' name='ticketid' value='" . $row['ticketid'] . "'>";
                    echo "<input type='submit' value='Delete'>";
                    echo "</form></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<header>";
                echo "<h1>No records found</h1>";
                echo "</header>";
            }
        } else {
            throw new Exception("Error: " . $conn->error);
        }

        // Close the connection
        $conn->close();
    } catch (Exception $e) {
        echo "<header>";
        echo "<h1>Error: " . $e->getMessage() . "</h1>";
        echo "</header>";
    }
    ?>
</body>
</html>