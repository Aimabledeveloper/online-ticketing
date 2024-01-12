<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
<title><b>our prices</b></title>
<link rel="stylesheet" href="style.css">
<style>
    body {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
<style>
    /* Header Styles */
    .headandlogo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
    }

    .location {
      display: flex;
      align-items: center;
      color: #333333;
    }

    .location h1 {
      font-size: 28px;
      margin: 0;
    }

    .location p {
      font-size: 14px;
      margin: 0;
    }

    .rogo {
      /* Add your logo styles here */
    }

    /* Navigation Styles */
    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 60px; /* Adjust margin-top to push content below the fixed header */
    }

    .menu ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
      background-color: green;
    }

    .menu ul li {
      margin-right: 9px;
    }

    .menu ul li a {
      text-decoration: none;
      color: ;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .menu ul li a:hover {
      color: #ff0000;
    }
</style>
   
    <div class="main">
        <div class="navbar">
            <div class="icon">
                
                
                <div class="menu">
                    <ul>
                        <li><a href="#"><a href="home page.php">HOME</a></a></li>
                        <li><a href="about.php">ABOUT</a></a></li>
                        <li><a href="#"><a href="destinations.php">DESTINATIONS</a></a></li>
                        <li><a href="prices.php">TOURE PRICES</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="#"><a href="buy ticket.php">Buy ticket</a></a></li>
                    </ul> 
                    </div> 
            </div>
            </div>
    
            <section>
                <div class="row">
                    <h2 class="section-heading">Our Affordbable prices::</h2>
                </div>
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

// Fetch data from the database
$sql = "SELECT location, price FROM uppdetprice";
$result = $conn->query($sql);
?>

<div class="row">
    <?php
    // Check if there are rows returned from the database
    if ($result->num_rows > 0) {
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            $location = $row["location"];
            $price = $row["price"];
        ?>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class='bx bx-money'></i>
                    </div>
                    <div class="card-content">
                        <p><?php echo $location; ?></p>
                        <p><?php echo $price; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        echo "No data available.";
    }
    ?>
</div>

<style>
    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 10px;
        box-shadow: 0 2px 4px r;
        transition: background-color 0.3s ease; /* Add transition for smooth hover effect */
    }

    .card:hover {
        background: bluel;
    }

    .card-content {
        margin-top: 10px;
        text-align: center;
    }

    .icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background-color: green;
        color: white;
        border-radius: 50%;
        font-size: 30px;
        margin-bottom: 10px;
    }

    .column {
        flex: 33.33%;
        padding: 0 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        padding: 0 4px;
        margin-top: 20px;
        margin-left: -4px;
        margin-right: -4px;
    }
</style>

<?php
// Close the connection
$conn->close();
?>
            </section></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
            <footer>
                <div class="footercontainer">
                <div class="socialicons">
                       <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
                        <a href="http://www.discardless.eu/twitter.com/login62b1.html?lang=en-gb"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.google.com/"><i class="fa-brands fa-google-plus"></i></a>
                        <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                    </div>
            
                    <div class="footerNav">
                    
                        <ul>
                        <li><a href="home page.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="destinations.php">Destinations</a></li>
                        <li><a href="prices.php">Toure prices</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="buy ticket.php">Buy ticket</a></li>
                    </ul>
                    </div>
                   </div>
                    <div class="footerBotton">
                        <p>copyRight &copy;2023; Designed by <span class="designer">Aimable</span></p>
                    </div>
                
        
        </footer>
</body>
</html>