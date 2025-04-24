<?php
    // PHP Code to handle login
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connect to MySQL (adjust credentials if needed)
        $conn = new mysqli("localhost", "root", "", "testdb");

        if ($conn->connect_error) {
            die("<div class='message'>Connection failed: " . $conn->connect_error . "</div>");
        }

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "<div class='message' style='color:green;'>Login successful!</div>";
        } else {
            echo "<div class='message'>Invalid username or password.</div>";
        }

        $conn->close();
    }
    ?>