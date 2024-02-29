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

    $sql = "INSERT INTO logare (username, password) VALUES ('$username', '$password')";


    if (mysqli_query($conn, $sql)) {
        header("Location: patient.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css"> 
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
          <input type="checkbox" id="darkmode-toggle" onchange="toggleDarkMode()" />
          <label class="custom-label" for="darkmode-toggle">
          </label>
        </li> -->
      </ul>
    </nav>
<div class="container">
    <h2>Sign Up</h2>
    <form method="POST" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
    <p><b>Already have an account? </b><a href="login.php">Log In</a></p>
</div>
<script src="button.js"></script>
</body>
</html>
