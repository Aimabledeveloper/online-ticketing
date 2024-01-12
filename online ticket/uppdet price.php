
<html>
    <head>
        <title>Uppdet price</title>
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
        </style>
    </head>
    <body>
       
        <form class="registration-form" action="" method="POST">
        <div class="form-group">
                <label for="id">Location ID:</label>
                <input type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="location">location:</label>
                <input type="text" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="price">price:</label>
                <input type="text" id="price" name="price">
            </div>
    
            <button type="submit"name="submit">Uppdet</button>
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
    $id = $_POST["id"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO uppdetprice (id, location, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $id, $location, $price);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
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