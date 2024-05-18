<?php

// Assuming you have a database connection established already
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming form values are posted
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare SQL query to fetch the hashed password for the given username
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // If the user is found in the database
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the entered password against the hashed password
            if (password_verify($password, $hashed_password)) {
                // If password matches, redirect to the dashboard
                header("Location: home.php");
                exit; //Ensure that no other output is sent
            } else {
                // If password does not match, redirect back to the login page with an error message
                header("Location: login.php?error=1");
                exit; //Ensure that no other output is sent
            }
        } else {
            // If the user is not found, redirect back to the login page with an error message
            header("Location: login.php?error=1");
            exit; //Ensure that no other output is sent
        }
    }
}

// Close the db connection
$conn->close();