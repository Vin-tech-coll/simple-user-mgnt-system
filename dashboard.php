<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Dashboard</title>
</head>

<body>

    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>

    <div class="welcome-message">
        <h1>JabaRation User Management System</h1>
    </div>


    <!-- Adding New User -->
    <div class="form-input">
        <!-- Form to handle the redirection -->
        <form action="adduser.php" method="get">

            <input type="submit" name="submit" value="Add New User">
        </form>
    </div>

    <?php
if(isset($_POST['submit'])){
    header("Location: viewusers.php");
    exit();
}
?>

    <!-- View All Users -->
    <div class="form-input">
        <!-- Form to handle the redirection -->
        <form action="viewusers.php" method="get">

            <input type="submit" name="submit" value="View Users">
        </form>
    </div>
    <?php
if(isset($_POST['submit'])){
    header("Location: viewusers.php");
    exit();
}
?>

    <!-- Update/Edit User -->
    <div class="form-input">
        <!-- Form to handle the redirection -->
        <form action="edituser.php" method="get">

            <input type="submit" name="submit" value="Edit Users">
        </form>
    </div>
    <?php
if(isset($_POST['submit'])){
    header("Location: viewusers.php");
    exit();
}
?>

    <!-- Delete User -->
    <div class="form-input">
        <!-- Form to handle the redirection -->
        <form action="deleteuser.php" method="get">

            <input type="submit" name="submit" value="Delete User">
        </form>
    </div>
    <?php
if(isset($_POST['submit'])){
    header("Location: viewusers.php");
    exit();
}
?>



</body>

</html>