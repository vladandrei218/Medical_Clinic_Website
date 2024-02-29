<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "doctor";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
  die("Failed to connect to the database!");
}

$sql = "SELECT * FROM doctori";
$result = $conn->query($sql);
$doctors = array(); 

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $doctor = array(
      'firstName' => $row['first_name'],
      'lastName' => $row['last_name'],
      'specialization' => $row['specialization'],
      'bio' => $row['description']
    );

    $doctors[] = $doctor; 
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctors</title>
  <link rel="icon" type="image/x-icon" href="Logo.png">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="button.css">
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
        <a href="#" class="dropbtn"><b><span id="service"><b>Services</b></span><span class="arrow"></span></b></a>
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
      <li>
        <input type="checkbox" id="darkmode-toggle" onchange="toggleDarkMode()" />
        <label class="custom-label" for="darkmode-toggle">
        </label>
      </li>
    </ul>
  </nav>
  <div class="container" id="dct">
    <?php
    foreach ($doctors as $index => $doctor) {
      $doctorId = 'doctor' . ($index + 1);
      echo '<div class="doctor" onclick="openModal(\'' . $doctorId . '\')">';
      echo '<img src="doctor_' . ($index + 1) . '.png" alt="Doctor ' . ($index + 1) . '">';
      echo '<p>'.'Dr. ' . $doctor['firstName'] . ' ' . $doctor['lastName'] . '</p>';
      echo '<p>Specialization: ' . $doctor['specialization'] . '</p>';
      echo '</div>';
      echo '<div id="' . $doctorId . '-modal" class="modal">';
      echo '<div class="modal-content">';
      echo '<button class="close" onclick="closeModal(\'' . $doctorId . '\')">&times;</button>';
      echo '<p>' . $doctor['bio'] . '</p>';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
  <script src="button.js"></script>
</body>
</html>

