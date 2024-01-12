<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!--Boxicons-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- My css-->
        <link rel="stylesheet" href="amatike.css">
        <title>Ticket</title>
        <style>
    body {
      background-color: #f1f1f1;
    }
  </style>
    </head>
    <body>
        <!--CONTENT-->
        <section id="content">
            <!--MAIN---->
            <main>
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

                    $location = $_GET["location"];

                    // Fetch data from the database for the specific location and ticket ID
                    $sql = "SELECT ticketid, time, location, departure, arrival, platenumber, price, status FROM ticket WHERE location = '$location'";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        throw new Exception("Error executing query: " . $conn->error);
                    }
                    ?>

                    <link rel="stylesheet" href="dashboard.css">

                    <div class="head-title">
                        <div class="left">
                            <ul class="box-info">
                                <?php
                                // Check if there are rows returned from the database
                                if ($result->num_rows > 0) {
                                    // Loop through each row of data
                                    while ($row = $result->fetch_assoc()) {
                                        $ticketid = $row["ticketid"];
                                        $time = $row["time"];
                                        $location = $row["location"];
                                        $departure = $row["departure"];
                                        $arrival = $row["arrival"];
                                        $platenumber = $row["platenumber"];
                                        $price = $row["price"];
                                        $status = $row["status"];
                                        ?>
                                        <li>
                                            <div class="column">
                                                <div class="card">
                                                    <div class="icon-wrapper">
                                                        <i class='bx bx-money'></i>
                                                    </div>
                                                    <div class="card-content">
                                                        <p><b>Ticket ID:</b> <?php echo $ticketid; ?></p>
                                                        <p><b>Time:</b> <?php echo $time; ?></p>
                                                        <p><b>Location:</b> <?php echo $location; ?></p>
                                                        <p><b>Departure:</b> <?php echo $departure; ?></p>
                                                        <p><b>Arrival:</b> <?php echo $arrival; ?></p>
                                                        <p><b>Plate number:</b> <?php echo $platenumber; ?></p>
                                                        <p><b>Price:</b> <?php echo $price; ?></p>
                                                        <p><b>Status:</b> <?php echo $status; ?></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="pay.php?ticketid=<?php echo urlencode($ticketid); ?>&location=<?php echo urlencode($location); ?>">Pay Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                } else {
                                    echo "No data available.";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }

                // Close the connection
                if (isset($conn)) {
                    $conn->close();
                }
                ?>
            </main>
        </section>

        <script src="dashbord.js"></script>
        <!--CONTENT-->
    </body>
</html>