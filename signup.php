<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup-login.css">
    <title>Signup</title>
</head>

<body>
    <div class="signup-container">
        <h2>Signup Form</h2>
        <form action="signup-dbconnect.php" method="post">
            <div class="form-input">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-input">
                <label for="password">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password">

            </div>
            <div>
                <input type="submit" value="signup">
            </div>

        </form>
    </div>


</body>

</html>