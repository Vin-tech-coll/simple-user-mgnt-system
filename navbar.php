<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Navbar</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="navbar">
            <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/home.php' ? 'active' : ''); ?>" href="home.php"><i
                    class="fas fa-home"></i> Home</a>
            <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/dashboard.php' ? 'active' : ''); ?>"
                href="dashboard.php"><i class="fas fa-chart-bar"></i> Dashboard</a>
            <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/setting.php' ? 'active' : ''); ?>" href="settings.php"><i
                    class="fas fa-cog"></i> Settings</a>
            <a class="<?php echo ($_SERVER['REQUEST_URI'] == '/logout.php' ? 'active' : ''); ?>" href="logout.php"><i
                    class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

    <!-- Your page content goes here -->

</body>

</html>