
<html>
    <head>
        <title>Add Driver</title>
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
                <label for="driverid">Driver ID:</label>
                <input type="text" id="driverid" name="driverid">
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="secondname">Second Name:</label>
                <input type="text" id="secondname" name="secondname">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <label>
  <input type="radio" name="gender" value="male"> Male
</label>
<label>
  <input type="radio" name="gender" value="female"> Female
</label>

            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone number:</label>
                <input type="text" id="phonenumber" name="phonenumber">
            </div>
            <div class="form-group">
                <label for="email">email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="Category" name="Category">
            </div>
           
    
            <button type="submit"name="submit">Submit</button>
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
    $driverid = $_POST["driverid"];
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $gender = $_POST["gender"];
    $location = $_POST["location"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $category = $_POST["Category"];

    // Validate the form data (you can add more validation as per your requirements)
    if (empty($driverid) || empty($firstname) || empty($secondname) || empty($gender) || empty($location) || empty($phonenumber) || empty($email) || empty($age) || empty($category)) {
        echo "Please fill in all the required fields.";
    } else {
        // Create a prepared statement
        $stmt = $conn->prepare("INSERT INTO drivers (driverid, firstname, secondname, gender, location, phonenumber, email, age, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $driverid, $firstname, $secondname, $gender, $location, $phonenumber, $email, $age, $category);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
    </body>
    </html>