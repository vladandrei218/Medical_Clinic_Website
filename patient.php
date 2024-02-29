<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "patient"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM mock_data"; 

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Gender</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Disease</th>";
    echo "</tr>";
    mysqli_fetch_assoc($result);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['COL 1'] . "</td>";
        echo "<td>" . $row['COL 2'] . "</td>";
        echo "<td>" . $row['COL 3'] . "</td>";
        echo "<td>" . $row['COL 4'] . "</td>";
        echo "<td>" . $row['COL 5'] . "</td>";
        echo "<td>" . $row['COL 6'] . "</td>";
        echo "<td>" . $row['COL 7'] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
} else {
    echo "No data found.";
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="styles_pat.css">
    <link rel="stylesheet" href="button.css">  
    <style>
      
      table {
        margin-top: 12vh;
        width: 100%;
        border-collapse: collapse;
      }

      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #42a86e;
      }
      tr:nth-child(even)
      {
        background-color: #cccccc;
      }
    </style>
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
               
        <li>
          <input type="checkbox" id="darkmode-toggle" onchange="toggleDarkMode()" />
          <label for="darkmode-toggle">
          </label>
        </li>
      </ul>
</nav>
<script src="button.js"></script>
</body>
</html>
