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
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $subject = $_POST["subject"];
    $massage = $_POST["massage"];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO contact (username, email, phonenumber, subject, massage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $phonenumber, $subject, $massage);

    // Execute the statement
    if ($stmt->execute()) {
        echo "message sent.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="irw.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h4 {
            margin-top: 0;
            text-align: center;
        }

        .container input[type="text"],
        .container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container textarea {
            resize: vertical;
            height: 100px;
        }

        .container input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container contact-form">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h4>Contact us</h4>
            <input type="text" name="username" id="username" placeholder="Enter your name">
            <input type="text" name="email" id="email" placeholder="your email@gmail.com">
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Tel: +250">
            <input type="text" name="subject" id="subject" placeholder="Subject">
            <textarea name="massage" id="massage" cols="15" rows="5" placeholder="Your Message..."></textarea>
            <input type="submit" value="Send" name="submit">
        </form>
    </div>
    <script type="text/javascript" src="irw.js"></script>
</body>
</html>