<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="create.css">
    <title>Create Account</title>
    <style>
        .wrapper {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background:green;
        }

        .input-box {
            margin-bottom: 10px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Create Account</h1>
            <div class="input-box">
                <input type="text" placeholder="adminid" name="adminid" id="adminid" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Admin name" name="adminname" id="adminname" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="E-mail address" name="emailaddress" id="emailaddress" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="hashedpassword" placeholder="Password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <p><b>Select your country</b></p>
            <select name="country" id="country">
                <option value="Rwanda" selected>Rwanda</option>
                <option value="Burundi">Burundi</option>
                <option value="Uganda">Uganda</option>
            </select>
            <button type="submit" class="btn" name="submit">Create</button>
        </form>
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

    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        // Retrieve the form data
        $adminid = $_POST["adminid"];
        $adminname = $_POST["adminname"];
        $emailaddress = $_POST["emailaddress"];
        $country = $_POST["country"];
        $password = $_POST["password"];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create a prepared statement
        $stmt = $conn->prepare("INSERT INTO admin (adminid, adminname, emailaddress, country, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $adminid, $adminname, $emailaddress, $country, $password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Account created.";
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