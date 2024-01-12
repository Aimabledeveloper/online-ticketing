
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query to count the number of records in the "drivers" table
$sqlDrivers = "SELECT COUNT(*) AS driverCount FROM drivers";
$resultDrivers = $conn->query($sqlDrivers);

if ($resultDrivers->num_rows > 0) {
    $rowDrivers = $resultDrivers->fetch_assoc();
    $driverCount = $rowDrivers["driverCount"];
} else {
    $driverCount = 0;
}

// Execute the query to count the number of records in the "bus" table
$sqlBus = "SELECT COUNT(*) AS busCount FROM bus";
$resultBus = $conn->query($sqlBus);

if ($resultBus->num_rows > 0) {
    $rowBus = $resultBus->fetch_assoc();
    $busCount = $rowBus["busCount"];
} else {
    $busCount = 0;
}

// Execute the query to count the number of records in the "ticket" table
$sqlTicket = "SELECT COUNT(*) AS ticketCount FROM ticket";
$resultTicket = $conn->query($sqlTicket);

if ($resultTicket->num_rows > 0) {
    $rowTicket = $resultTicket->fetch_assoc();
    $ticketCount = $rowTicket["ticketCount"];
} else {
    $ticketCount = 0;
}

// Execute the query to count the number of records in the "create_account" table
$sqlCreateAccount = "SELECT COUNT(*) AS createAccountCount FROM create_account";
$resultCreateAccount = $conn->query($sqlCreateAccount);

if ($resultCreateAccount->num_rows > 0) {
    $rowCreateAccount = $resultCreateAccount->fetch_assoc();
    $createAccountCount = $rowCreateAccount["createAccountCount"];
} else {
    $createAccountCount = 0;
}

// Execute the query to calculate the sum of values in the "ticket_price" column of the "payment" table
$sqlPayment = "SELECT SUM(ticket_price) AS totalPayment FROM payment";
$resultPayment = $conn->query($sqlPayment);

if ($resultPayment->num_rows > 0) {
    $rowPayment = $resultPayment->fetch_assoc();
    $totalPayment = $rowPayment["totalPayment"];
} else {
    $totalPayment = 0;
}

// Execute the query to count the sum of rows in the "ticket" table based on the values in the "location" column
$sqlLocation = "SELECT COUNT(*) AS locationCount FROM ticket GROUP BY location";
$resultLocation = $conn->query($sqlLocation);

if ($resultLocation->num_rows > 0) {
    $locationCount = 0;
    while ($rowLocation = $resultLocation->fetch_assoc()) {
        $locationCount += $rowLocation["locationCount"];
    }
} else {
    $locationCount = 0;
}
// Execute the query to count the number of records in the "payment" table
$sqlUsernames = "SELECT COUNT(DISTINCT username) AS usernameCount FROM payment";
$resultUsernames = $conn->query($sqlUsernames);

if ($resultUsernames->num_rows > 0) {
    $rowUsernames = $resultUsernames->fetch_assoc();
    $usernameCount = $rowUsernames["usernameCount"];
} else {
    $usernameCount = 0;
}
// Close the database connection
$conn->close();
?>

<?php
session_start();

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online ticket";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve the adminname from the "admin" table
    $adminname = '';

    if (isset($_SESSION['adminname'])) {
        $loggedInAdminname = $_SESSION['adminname'];
        $sql = "SELECT adminname FROM admin WHERE adminname = '$loggedInAdminname'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $adminname = $row['adminname'];
            } else {
                throw new Exception('No rows returned.');
            }
        } else {
            throw new Exception('Query failed: ' . $conn->error);
        }
    } else {
        // Handle the error when the name is not found in the session
        throw new Exception('Error: Name not found in session.');
    }

    $conn->close();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Count Drivers and Buses</title>
    <style>
        h1 {
            font-size: 24px; /* Adjust the font size as desired */
        }
    </style>
</head>
<body>
    <h1>Number of drivers: <?php echo $driverCount; ?></h1>
    <h1>Number of buses: <?php echo $busCount; ?></h1>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- My css-->
    <link rel="stylesheet" href="dashbord.css">
    <title>Admin Hub</title>
    <style>
        h1 {
            font-size: 15px; /* Adjust the font size as desired */
        }
    </style>
</head>
<body>
    <!--SIDEBAR-->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <li>
                    <a href="dashbord.php">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">dashbord</span>
                    </a>
                </li>
                <li>
                    <a href="tickets.php">
                        
                        <i class='bx bx-shopping-bag' ></i>
                        <span class="text">Ticket</span>
                    </a>
                </li>
                <li>
                    <a href="bus.php">
                        <i class='bx bxs-bus'></i>
                        <span class="text">bus</span>
                    </a>
                </li>
                <li>
                    <a href="deriver.php">
                        <i class='bx bxs-car' ></i>
                        <span class="text">Dirivers</span>
                    </a>
                </li>
                <li>
                    <a href="pricing.php">
                        <i class='bx bxs-book-content' ></i>
                        <span class="text">plicing</span>
                    </a>
                </li>
                <li>
                    <a href="client.php">
                        <i class='bx bxs-group' ></i>
                        <span class="text">Client</span>
                    </a>
                </li>
                <li>
                    <a href="destinationdash.php">
                        <i class='bx bx-current-location'></i>
                        <span class="text">Destinations</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="logout">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Log out</span>
                    </a>
                </li>
            </ul>
        </section>
        <!--SIDEBAR-->

        <!--CONTENT-->
        <section id="content">
            <!--NAVBAR-->
            <nav>
                <i class='bx bx-menu'></i>
                <a href="#" class="nav-link">Categories</a>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="search....">
                        <button type="submit" class="search-btn"><i class='bx bx-search-alt-2' ></i></button>
                    </div>
                </form>
                <a href="#" class="notification">
    <i class='bx bxs-message-rounded-dots'></i>
    <span class="num">8</span>
</a>
<a href="#" class="notification">
    <i class='bx bx-bell'></i>
    <span class="num">8</span>
</a>
<h><b><i><?php echo $_SESSION['adminname']; ?></i></b></h>
</nav>
            <!--NAVBAR-->

            <!--MAIN---->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>dashbord</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">dashbord</a>
                            </li>
                            <li><i class='bx bxs-chevron-right' ></i></li>
                            <li>
                                <a class="active"href="home page.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="box-info">
                    <li>
                        <i class='bx bxs-car'></i>
                        <span class="text">
                        <h1>Number of drivers: <?php echo $driverCount; ?></h1>
                            
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-car'></i>
                        <span class="text">
                        <h1>Number of tickets: <?php echo $ticketCount; ?></h1>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group' ></i>
                        <span class="text">
                        <h1>All client: <?php echo $createAccountCount; ?></h1>
                        </span>
                    </li>
                    <li>
                        <i class='bx bx-dollar-circle'></i>
                        <span class="text">
                        <h1>Total payment: <?php echo $totalPayment; ?></h1>
                        </span>
                    </li>
                </ul>
                <ul class="box-info">
                    <li>
                        <i class='bx bx-book-content'></i>
                        <span class="text">
                        <h1>Number of booked: <?php echo $usernameCount; ?></h1>
                        </span>
                    </li>
                    
                    <li>
                        <i class='bx bxs-car'></i>
                        <span class="text">
                        <h1>Number of buses: <?php echo $busCount; ?></h1>
                            
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-registered'></i>
                        <span class="text">
                        <h1>Routes: <?php echo $locationCount; ?></h1>
                        </span>
                    </li>
                </ul>
            </main>
        </section>
        <!--CONTENT-->

        <script src="dashbord.js"></script>
    </body>
</html>