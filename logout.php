<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System logout</title>
</head>

<body>
    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>

    <div class="welcome-message">
        <h1>JabaRation User Management System</h1>
    </div>
    
    <div class="logout-message">
        <h2>Dear <?php echo $_SESSION['user']?>,</h2>
        <p>Welcome back next time!</p>
    </div>
    <!-- Logout button -->
    <form action="logout-process.php" method=" post">
        <div class="form-input">
            <input type="submit" value="logout" value="Logout">
        </div>


</body>

</html>