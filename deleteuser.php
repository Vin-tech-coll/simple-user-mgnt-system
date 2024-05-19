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

// Delete User
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete user
    $sql = "DELETE FROM employees WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //Redirect back to viewusers.php after deletion
    header('Location: viewusers.php');
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>


</head>

<body>
    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>


    <h2>Delete User</h2>
    <p>User deletion process initiated.</p>
</body>

</html>