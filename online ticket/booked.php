<!DOCTYPE html>
<html>
<head>
    <title>all booked</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Add custom CSS for table styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: green;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 4px;
        }

        .error-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'online ticket';

        $connection = mysqli_connect($hostname, $username, $password, $database);

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Check if a delete request is made
        if (isset($_GET['delete'])) {
            $deleteId = $_GET['delete'];

            $deleteQuery = "DELETE FROM payment WHERE payment_id = $deleteId";
            $deleteResult = mysqli_query($connection, $deleteQuery);

            if ($deleteResult) {
                echo "<div class='success-message'>Record with ID $deleteId has been deleted successfully.</div>";
            } else {
                echo "<div class='error-message'>Error deleting record: " . mysqli_error($connection) . "</div>";
            }
        }

        $query = "SELECT * FROM payment";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Username</th>
                    <th>Ticket Time</th>
                    <th>Ticket Price</th>
                    <th>Action</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $payment_id = $row['payment_id'];
                $username = $row['username'];
                $ticketTime = $row['ticket_time'];
                $ticketPrice = $row['ticket_price'];

                echo "<tr>
                        <td>$username</td>
                        <td>$ticketTime</td>
                        <td>$ticketPrice</td>
                        <td><a href='?delete=$payment_id'>Delete</a></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<div class='error-message'>No records found in the payment table.</div>";
        }

        mysqli_close($connection);
        ?>
    </div>
</body>
</html>