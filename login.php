<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup-login.css">
    <title>Login Form</title>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login-dbconnect.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="login">
        </form>
    </div>

    </div>

</body>

</html>