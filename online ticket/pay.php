<!DOCTYPE html>
<html>
<head>
    <title>Pay</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
    <?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'online ticket';

    $connection = mysqli_connect($hostname, $username, $password, $database);

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ticketPrice = $_POST['ticket_price'];

        $query = "SELECT * FROM create_account WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful, perform the necessary actions
            $ticketTime = date('Y-m-d H:i:s'); // Get the current date and time

            if ($ticketPrice > 0) {
                // Insert payment details into the payment table
                $insertQuery = "INSERT INTO payment (username, ticket_time, ticket_price) VALUES ('$username', '$ticketTime', '$ticketPrice')";
                $insertResult = mysqli_query($connection, $insertQuery);

                if ($insertResult) {
                    // Payment successful, insert data into the notification table
                    $notificationMessage = "Payment received for ticket. Username: $username, Ticket time: $ticketTime, Ticket price: $ticketPrice";
                    $insertNotificationQuery = "INSERT INTO notification (message) VALUES ('$notificationMessage')";
                    $insertNotificationResult = mysqli_query($connection, $insertNotificationQuery);

                    if ($insertNotificationResult) {
                        echo "Payment successful! Ticket time: $ticketTime, Ticket price: $ticketPrice";
                    } else {
                        echo "Failed to insert notification details.";
                    }
                } else {
                    echo "Failed to insert payment details.";
                }
            } else {
                echo "Invalid ticket price. Please enter a positive number.";
            }
        } else {
            // Login failed, handle the error or display an appropriate message
            echo "Invalid credentials. Please try again.";
        }
    }
    ?>
    <form method="POST">
        <h1>Pay</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="number" step="0.01" placeholder="Ticket Price" name="ticket_price" required>
            <i class='bx bx-dollar'></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" name="remember">Remember me</label>
            <a href="#">Forgot password</a>
        </div>
        <button type="submit" class="btn" name="submit">Pay</button>
        <div class="register-link">
            <p>Don't have an account?<a href="create.php">Register</a></p>
        </div>
    </form>
    </div>

    <!-- Add your JavaScript code and other footer elements here -->
</body>
</html>