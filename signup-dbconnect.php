<?php
// Assuming you have a database connection established already
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_management";

// Create connection
$conn = new mysqli($servername ,$username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully <br>";

// Assuming form values are posted
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL query to insert data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";


// Execute the query
if ($conn->query($sql) === TRUE) {
    //Redirect to login.php if the query is executed successfully
    header("Location:login.php");
    exit; //Ensure that no other output is sent
} else {
    //Handle the error if query fails
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the db connection
$conn->close(); 