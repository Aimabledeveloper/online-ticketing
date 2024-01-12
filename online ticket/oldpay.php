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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Retrieve the form data
    $names = $_POST["names"];
    $phonenumber = $_POST["phone_number"];
    $amount = $_POST["amount"];
    $momopassword = $_POST["momo_password"];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO payment (names, phonenumber, amount, momopassword) VALUES (?, ?, ?, ?)");
    
    // Bind the parameters
    $stmt->bind_param("ssss", $names, $phonenumber, $amount, $momopassword);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment successfully thankx.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<html lang="en">
<head>
    <title>Payment Form</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1>Pay</h1>
            
            <div class="input-box">
                <input type="text" name="names" placeholder="Names" required>
            </div>
            <div class="input-box">
                <input type="text" name="phone_number" placeholder="Phone Number" required>
            </div>
            <div class="input-box">
                <input type="text" name="amount" placeholder="Amount" required>
            </div>
            <div class="input-box">
                <input type="password" name="momo_password" placeholder="Momo Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" name="submit" class="btn">Pay</button>
        </form>
    </div>
</body>
</html>