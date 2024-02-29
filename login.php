<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "neuropraxis"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM logare WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        header("Location: patient.php"); 
        exit();
    } else {
        echo "Invalid username or password.";
    }
    $email = $_POST["email"];
    $message = $_POST["message"];
    $sql = "INSERT INTO messages (email, message) VALUES ('$email', '$message')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">  
    <link rel="stylesheet" href="appointment.css">
    <script src="func.js"></script>
</head>
<body>
<nav>
      <a href="index.html" class="logo">
        <img src="Logo_1.png" alt="Logo">
      </a>
      <ul>
        <li><a href="index.html"><b>Home</b></a></li>
        <li class="dropdown">
            <a href="" class="dropbtn"><b><span id="service"><b>Services</b></span><span class="arrow"></span></b></a>
            <div class="dropdown-content">
              <a href="analysis.html">Analysis</a>
              <a href="operations.html">Operations</a>
            </div>
          </li>
        <li><a href="doctors.php"><b>Doctors</b></a></li>
        <li><a href="contact.html"><b>Contact</b></a></li>
        <li><a href="login.php">
          <img src="login.png" id="login">
        </a></li>      
        <!-- <li>
          <input  type="checkbox" id="darkmode-toggle" onchange="toggleDarkMode()" />
          <label  class="custom-label" for="darkmode-toggle">
          </label>
        </li> -->
      </ul>
    </nav>
    <div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required><br><br>
    <input type="submit" value="Login">
</form>

    <br>
    <p><b>Don't have an account? </b><a href="signup.php">Sign Up</a></p>  
    <div class="doctor" onclick="openModal('doctor2')">
        <a class="btn-appointment">Schedule an Appointment</a>
    </div>

    <div id="doctor2-modal" class="modal">
        <div class="modal-content">
            <button class="close" onclick="closeModal('doctor2')">&times;</button>
            <div class="form-container">
                <h1>Contact Form</h1>   
                <form method="POST" action="">
                    <label for="email">Email:</label>
                    <textarea id="email" name="email" rows="1" cols="78" required></textarea>
                    <br>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="8" cols="78" required></textarea>
                    <br>
                    <input type="submit" value="Submit">
                </form>       
            </div>
        </div>
    </div>
</div>
<script src="button.js"></script>
</body>
</html>
