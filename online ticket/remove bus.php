<html>
<head>
    <title>Remove Bus</title>
    <style>
        .registration-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form class="registration-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label for="busid">Bus ID:</label>
            <input type="text" id="busid" name="busid">
        </div>
        <div class="form-group">
            <label for="busmode">Bus Model:</label>
            <input type="text" id="busmode" name="busmode">
        </div>

        <button type="submit" name="submit">Remove</button>
    </form>

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
        $busid = $_POST["busid"];

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("DELETE FROM bus WHERE busid = ?");
        $stmt->bind_param("s", $busid);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Bus removed successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>