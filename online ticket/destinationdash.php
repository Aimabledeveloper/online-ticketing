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
$sqlTicket = "SELECT COUNT(*) AS ticketCount FROM ticket";
$resultTicket = $conn->query($sqlTicket);

if ($resultTicket->num_rows > 0) {
    $rowTicket = $resultTicket->fetch_assoc();
    $ticketCount = $rowTicket["ticketCount"];
} else {
    $ticketCount = 0;
}



// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!--Boxicons-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- My css-->
        <link rel="stylesheet" href="dashbord.css">
        <title>tickets</title>
        <style>
    /* CSS for the dropdown */
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: ;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
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
                    <a href="all deriver.php">
                        <i class='bx bxs-car' ></i>
                        <span class="text">Dirivers</span>
                    </a>
                </li><li>
                    <a href="pricing.php">
                        <i class='bx bxs-book-content' ></i>
                        <span class="text">Plicing</span>
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
                        <button class="dropbtn"><span class="text">Destinations</span></button>
                        <div class="dropdown-content">
                            <a href="add destination.php">Add destination</a></br>
                            <a href="remove destination.php">Remove destination</a></br>
                            <a href="all destinations.php">All destinations</a></br>
                          </div>
                    </a>
                </li></br></br></br>
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
                    <i class='bx bx-bell' ></i>
                    <span class="num">8</span>
                 </a>
                 <a href="#" class="profile">
                    <img src="m.jpg">
                 </a>
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
                        <h1>Number of tickets: <?php echo $ticketCount; ?></h1>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-registered'></i>
                        <span class="text">
                        <h1>Routes: <?php echo $ticketCount; ?></h1>
                        </span>
                    </li>
                   
                </ul>
                </div>
            </main>
            
        </section>

        
        

       






        
        
        <script src="dashbord.js"></script>
        <!--CONTENT-->
        
    </body>
</html>