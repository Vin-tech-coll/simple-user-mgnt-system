<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add New User
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // SQL query to insert new user
    $sql = "INSERT INTO employees (name, email, role) VALUES ('$name', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        header("Location: viewusers.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Add New User</title>
</head>

<body>
    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>




    <!-- HTML form to input new user details -->
    <div class="adduserform-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="role">Role:</label><br>
            <input type="text" id="role" name="role" required><br><br>

            <input type="submit" value="Add User">

        </form>
    </div>


</body>

</html>