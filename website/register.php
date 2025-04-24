<?php 
// signup.php

// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // default for XAMPP
$dbname = "user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["uname"];
  $email = $_POST["email"];
  $pass = password_hash($_POST["password"], PASSWORD_DEFAULT); // secure password

  // Insert data into user table
  $sql = "INSERT INTO user (uname, email, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $user, $email, $pass);

  if ($stmt->execute()) {
    echo "<script>alert('User registered successfully!'); window.location.href = 'index.html';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
