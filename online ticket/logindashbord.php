
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'online ticket';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminname = $_POST["adminname"];
    $enteredPassword = $_POST["password"];

    // Retrieve the admin from the database based on the adminname
    $query = "SELECT * FROM admin WHERE adminname = '$adminname'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        $storedPassword = $admin['password'];

        // Verify the entered password with the stored password
        if ($enteredPassword === $storedPassword) {
            // Login successful, store adminname in session
            $_SESSION['adminname'] = $adminname;
            // Redirect to the dashboard
            header("Location: dashbord.php");
            exit();
        } else {
            // Login failed, handle the error or display an appropriate message
            echo "Invalid credentials. Please try again.";
        }
    } else {
        // Admin not found, handle the error or display an appropriate message
        echo "Invalid credentials. Please try again.";
    }
}

// Check if adminname session variable is set
if (isset($_SESSION['adminname'])) {
    // Admin is logged in, redirect to the dashboard or display a welcome message
    header("Location: dashboard.php");
    exit();
}
?><form method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Admin name" name="adminname" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" name="remember">remember me</label>
            <a href="#">Forgot password</a>
        </div>
        <button type="submit" class="btn" name="submit">Login</button>
        <div class="register-link">
            <p>Don't have an account?<a href="createacountadmin.php">Register</a></p>
        </div>
    </form>

    </div>

    <!-- Add your JavaScript code and other footer elements here -->
</body>
</html>