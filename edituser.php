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

// Update User
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // SQL query to update user
    $sql = "UPDATE employees SET name='$name', email='$email', role='$role' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        //Redirect to viewusers.php after successful update
        header("Location: viewusers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch user details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $role = $row['role'];
    } else {
        echo "User not found";
        exit;
    }
} else {
    echo "User ID not provided";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Edit User</title>
</head>

<body>
    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>

    <div class="welcome-message">
        <h1>JabaRation User Management System</h1>
    </div>

    <h2>Update/Edit User</h2>

    <div class="adduserform-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

            <label for="role">Role:</label><br>
            <input type="text" id="role" name="role" value="<?php echo $role; ?>" required><br><br>

            <input type="submit" value="Save">

        </form>
    </div>


</body>

</html>