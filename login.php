<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include("tools/header.php") ?>
    <div class="loginPageCenter"> 
        <h2 class="loginPageh2">Login</h2>
        
        <form action="tools/authenticate.php" method="post" class="loginform">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" value="Login" class="loginButton">
        </form>  
        <p>Heeft u nog geen account? </p>
        <a href="signup.php" class="loginPageLink">Meld u hier aan!</a>
    </div>
</body>
</html>