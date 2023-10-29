<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <?php include("tools/header.php") ?>
    <div class="loginPageCenter">
        <h2>Register</h2>
        <form action="tools/register.php" method="post" class="loginform">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Register" class="loginButton">
        </form>
    </div>
</body>
</html>